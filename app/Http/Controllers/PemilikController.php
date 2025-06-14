<?php

namespace App\Http\Controllers;

use App\Models\Properti;
use App\Models\Pemilik;
use App\Models\StatusProperti;
use App\Models\KalenderKetersediaan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use ImageKit\ImageKit;
use Carbon\Carbon;

class PemilikController extends Controller
{
    public function dashboard()
    {
        $pemilik = Auth::guard('pemilik')->user();
        $tanggal = now()->format('F Y');

        $propertiPemilik = $pemilik->properti()->pluck('nama_properti');
        $totalProperti = $pemilik->properti()->count();

        $propertiTerbooking = Transaksi::whereIn('nama_properti', $propertiPemilik)
            ->whereYear('tanggal_pembayaran', now()->year)
            ->whereMonth('tanggal_pembayaran', now()->month)
            ->count();

        $monthlyIncome = Transaksi::whereIn('nama_properti', $propertiPemilik)
            ->whereYear('tanggal_pembayaran', now()->year)
            ->whereMonth('tanggal_pembayaran', now()->month)
            ->sum('total_harga');

        $properties = $pemilik->properti()->take(3)->get();

        return view('pemilik.dashboards.dashboard', [
            'totalProperti' => $totalProperti,
            'propertiTerbooking' => $propertiTerbooking,
            'tanggal' => $tanggal,
            'data' => [
                'monthly_income' => $monthlyIncome
            ],
            'properties' => $properties,
        ]);
    }

    public function getRevenueData(Request $request)
    {
        $pemilik = Auth::guard('pemilik')->user();
        $propertiPemilik = $pemilik->properti()->pluck('nama_properti');

        $filterType = $request->get('filter', 'month'); // day, month, year
        $year = $request->get('year', now()->year);
        $month = $request->get('month', now()->month);
        $date = $request->get('date', now()->format('Y-m-d'));

        $query = Transaksi::whereNotNull('tanggal_pembayaran')
                          ->whereIn('nama_properti', $propertiPemilik);

        switch ($filterType) {
            case 'day':
                // Revenue by hours for a specific day
                $query->whereDate('tanggal_pembayaran', $date);
                $revenues = $query->selectRaw('HOUR(tanggal_pembayaran) as period, SUM(total_harga) as total')
                    ->groupBy('period')
                    ->orderBy('period')
                    ->get();

                $labels = [];
                $data = [];
                for ($i = 0; $i < 24; $i++) {
                    $labels[] = sprintf('%02d:00', $i);
                    $data[] = $revenues->where('period', $i)->first()->total ?? 0;
                }
                break;

            case 'month':
                // Revenue by days for a specific month
                $query->whereYear('tanggal_pembayaran', $year)
                      ->whereMonth('tanggal_pembayaran', $month);
                $revenues = $query->selectRaw('DAY(tanggal_pembayaran) as period, SUM(total_harga) as total')
                    ->groupBy('period')
                    ->orderBy('period')
                    ->get();

                $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;
                $labels = [];
                $data = [];
                for ($i = 1; $i <= $daysInMonth; $i++) {
                    $labels[] = $i;
                    $data[] = $revenues->where('period', $i)->first()->total ?? 0;
                }
                break;

            case 'year':
                // Revenue by months for a specific year
                $query->whereYear('tanggal_pembayaran', $year);
                $revenues = $query->selectRaw('MONTH(tanggal_pembayaran) as period, SUM(total_harga) as total')
                    ->groupBy('period')
                    ->orderBy('period')
                    ->get();

                $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                $labels = [];
                $data = [];
                for ($i = 1; $i <= 12; $i++) {
                    $labels[] = $monthNames[$i - 1];
                    $data[] = $revenues->where('period', $i)->first()->total ?? 0;
                }
                break;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
            'total' => array_sum($data)
        ]);
    }

    public function indexProperti(Request $request)
    {
        $query = Properti::with(['status', 'pemilik']);

        if ($request->has('lokasi') && $request->lokasi != '') {
            $query->where('lokasi', 'like', '%' . $request->lokasi . '%');
        }

        $properti = $query->get();

        $lokasi = Properti::select('lokasi')
            ->distinct()
            ->pluck('lokasi')
            ->map(function ($loc) {
                return trim(explode(',', $loc)[0]);
            })
            ->unique()
            ->values();

        return view('pemilik.properties.index', compact('properti', 'lokasi'));
    }

    public function showProperti($id_properti)
    {
        $properti = Properti::with(['status', 'pemilik'])->where('id_properti', $id_properti)->firstOrFail();

        $ulasan = Transaksi::where('nama_properti', $properti->nama_properti)
            ->whereHas('review')
            ->with(['review', 'pengguna'])
            ->latest()
            ->get();
        return view('pemilik.properties.detail', compact('properti', 'ulasan'));
    }

    public function create()
    {
        $pemilik = Pemilik::all();
        return view('pemilik.properties.formbuatproperti', compact('pemilik'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_properti' => 'required|string|max:255',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'harga_per_malam' => 'required|integer|min:0',
            'maksimum_tamu' => 'required|integer|min:1',
            'status' => 'required|in:tersedia,tidak_tersedia',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        // Remove id_properti since it's auto-incrementing
        unset($data['id_properti']);

        $data['id_pemilik'] = Auth::guard('pemilik')->user()->id_pemilik;

        // Map input `status` ke `id_status_properti`
        $status = StatusProperti::where('nama_status_properti', $request->status)->first();
        if (!$status) {
            return back()->withErrors(['status' => 'Status properti tidak valid']);
        }
        $data['id_status_properti'] = $status->id_status_properti;

        // Set default verification status (belum terverifikasi)
        $data['id_verifikasi_properti'] = '2'; // Assuming '2' is 'belum_terverifikasi'

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            $imagekit = new ImageKit(
                config('services.imagekit.public_key'),
                config('services.imagekit.private_key'),
                config('services.imagekit.url_endpoint')
            );

            $upload = $imagekit->upload([
                'file' => fopen($foto->getPathname(), 'r'),
                'fileName' => time() . '_' . $foto->getClientOriginalName(),
                'folder' => '/uploads-nginepo'
            ]);

            $data['foto'] = $upload->result->url;
        }

        Properti::create($data);

        return redirect()->route('pemilik.properti.index')->with('success', 'Properti berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $properti = Properti::findOrFail($id);
        $pemilik = Pemilik::all();
        $statuses = StatusProperti::all();
        return view('pemilik.properties.formubahproperti', compact('properti', 'pemilik', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_properti' => 'required|string|max:255',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'required|string',
            'harga_per_malam' => 'required|integer|min:0',
            'maksimum_tamu' => 'required|integer|min:1',
            'status_id' => 'required|exists:status_properti,id_status_properti',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $properti = Properti::findOrFail($id);
        $data = $request->except(['id_properti']); // Exclude id_properti from update

        if ($request->hasFile('foto')) {
            // Upload foto menggunakan ImageKit
            $foto = $request->file('foto');

            $imagekit = new ImageKit(
                config('services.imagekit.public_key'),
                config('services.imagekit.private_key'),
                config('services.imagekit.url_endpoint')
            );

            $upload = $imagekit->upload([
                'file' => fopen($foto->getPathname(), 'r'),
                'fileName' => time() . '_' . $foto->getClientOriginalName(),
                'folder' => '/uploads-nginepo'
            ]);

            $data['foto'] = $upload->result->url;
        }

        $properti->update($data);
        return redirect()->route('pemilik.properti.detail', ['id_properti' => $properti->id_properti])
            ->with('success', 'Properti berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $properti = Properti::findOrFail($id);

        if ($properti->foto && file_exists(public_path('uploads/' . $properti->foto))) {
            unlink(public_path('uploads/' . $properti->foto));
        }

        $properti->delete();

        return redirect()->route('pemilik.properti.index')->with('success', 'Properti berhasil dihapus!');
    }
}
