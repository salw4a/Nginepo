<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Pemilik;
use App\Models\Properti;
use App\Models\Transaksi;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = Pengguna::count();
        $totalProperties = Properti::count();
        $monthlyIncome = Transaksi::whereYear('tanggal_pembayaran', now()->year)
                                  ->whereMonth('tanggal_pembayaran', now()->month)
                                  ->sum('total_harga');
        $data = [
            'total_users'      => $totalUsers,
            'total_properties' => $totalProperties,
            'monthly_income'   => $monthlyIncome,
        ];
        return view('admin.dashboards.dashboard', compact('data'));
    }

    public function getRevenueData(Request $request)
    {
        $filterType = $request->get('filter', 'month'); // day, month, year
        $year = $request->get('year', now()->year);
        $month = $request->get('month', now()->month);
        $date = $request->get('date', now()->format('Y-m-d'));

        $query = Transaksi::whereNotNull('tanggal_pembayaran');

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

        $query->whereHas('status', function ($q) {
            $q->where('nama_status_properti', 'tersedia');
        });

        $properti = $query->get();

        $lokasi = Properti::select('lokasi')
            ->distinct()
            ->pluck('lokasi')
            ->map(function ($loc) {
                return trim(explode(',', $loc)[0]);
            })
            ->unique()
            ->values();

        return view('admin.properties.index', compact('properti', 'lokasi'));
    }
    public function showProperti($id_properti)
    {
        $properti = Properti::with(['status', 'pemilik'])->findOrFail($id_properti);

        $reviewTransaksi = \App\Models\Transaksi::with(['review', 'pengguna'])
            ->where('nama_properti', $properti->nama_properti)
            ->whereHas('review')
            ->get();

        return view('admin.properties.detail', compact('properti', 'reviewTransaksi'));
    }

    public function showUser()
        {
            // Ambil pengguna dengan role 'penyewa'
            $penyewa = Pengguna::with('role')
                ->whereHas('role', function ($query) {
                    $query->where('nama_role', 'penyewa');
                })
                ->get();

            // Ambil pemilik
            $pemilik = Pemilik::with('role')->get();

            // Gabung keduanya
            $users = $penyewa->concat($pemilik);

            // PAGINATION manual
            $perPage = 10;
            $currentPage = (int) request()->get('page', 1); // <-- konversi ke integer
            $pagedData = $users->forPage($currentPage, $perPage);

            $paginatedUsers = new \Illuminate\Pagination\LengthAwarePaginator(
                $pagedData,
                $users->count(),
                $perPage,
                $currentPage,
                ['path' => request()->url(), 'query' => request()->query()]
            );

            return view('admin.managements.manageuser', [
                'users' => $paginatedUsers
            ]);
        }
}
