<?php

namespace App\Http\Controllers;

use App\Models\Properti;
use App\Models\Pemilik;
use App\Models\KalenderKetersediaan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PemilikController extends Controller
{
    public function dashboard()
    {
        $pemilik = Auth::guard('pemilik')->user();
        $pemilik = Auth::guard('pemilik')->user();
        $tanggal = now()->format('F Y');

        $idPropertiPemilik = $pemilik->properti()->pluck('id_properti');
        $totalProperti = $pemilik->properti()->count();

        $propertiTerbooking = KalenderKetersediaan::whereYear('tanggal', now()->year)
            ->whereMonth('tanggal', now()->month)
            ->where('tersedia', false)
            ->whereIn('id_properti', $idPropertiPemilik)
            ->distinct('id_properti')
            ->count('id_properti');

        $monthlyIncome = 1500000;

        return view('pemilik.dashboard', [
            'totalProperti' => $totalProperti,
            'propertiTerbooking' => $propertiTerbooking,
            'tanggal' => $tanggal,
            'data' => [
                'monthly_income' => $monthlyIncome
            ]
        ]);
    }
    public function indexProperti(Request $request)
    {
        $query = Properti::with(['status', 'pemilik']);

        if ($request->has('lokasi') && $request->lokasi != '') {
            $query->where('lokasi', 'like', '%' . $request->lokasi . '%');
        }

        // Opsional: Filter properti berdasarkan pemilik yang sedang login
        // Misal: $query->where('pemilik_id', auth()->id());

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

        // Optional: Cek apakah properti milik pemilik yang login
        // if ($properti->pemilik_id !== auth()->id()) {
        //     abort(403, 'Unauthorized');
        // }

        return view('pemilik.properties.detail', compact('properti'));
    }

        public function index()
    {
        $properti = Properti::with('pemilik')->get();
        return view('katalog.index', compact('properti'));
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
            'id_pemilik' => 'required|exists:pemilik,id_pemilik',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'harga_per_malam' => 'required|integer|min:0',
            'maksimum_tamu' => 'required|integer|min:1',
            'status' => 'required|in:tersedia,tidak_tersedia',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['id_properti'] = 'PROP-' . Str::random(8);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFile = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads'), $namaFile);

            // Simpan URL lengkap ke database
            $data['foto'] = asset('uploads/' . $namaFile);
        }

        Properti::create($data);

        return redirect()->route('katalog.index')->with('success', 'Properti berhasil ditambahkan!');
    }

    public function show($id)
    {
        $properti = Properti::with('pemilik')->findOrFail($id);
        return view('katalog.show', compact('properti'));
    }

    public function edit($id)
    {
        $properti = Properti::findOrFail($id);
        $pemilik = Pemilik::all();
        return view('katalog.edit', compact('properti', 'pemilik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_properti' => 'required|string|max:255',
            'id_pemilik' => 'required|exists:pemilik,id_pemilik',
            'lokasi' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'harga_per_malam' => 'required|integer|min:0',
            'maksimum_tamu' => 'required|integer|min:1',
            'status' => 'required|in:tersedia,tidak_tersedia',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $properti = Properti::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($properti->foto && file_exists(public_path('uploads/' . $properti->foto))) {
                unlink(public_path('uploads/' . $properti->foto));
            }

            $foto = $request->file('foto');
            $namaFile = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads'), $namaFile);
            $data['foto'] = $namaFile;
        }

        $properti->update($data);

        return redirect()->route('katalog.index')->with('success', 'Properti berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $properti = Properti::findOrFail($id);

        // Hapus foto jika ada
        if ($properti->foto && file_exists(public_path('uploads/' . $properti->foto))) {
            unlink(public_path('uploads/' . $properti->foto));
        }

        $properti->delete();

        return redirect()->route('katalog.index')->with('success', 'Properti berhasil dihapus!');
    }
}
