<?php

namespace App\Http\Controllers;

use App\Models\Properti;
use App\Models\Transaksi;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PenyewaController extends Controller
{
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

        return view('penyewa.properties.index', compact('properti', 'lokasi'));
    }

    public function showProperti($id_properti)
    {
        $properti = Properti::with(['status', 'pemilik'])->findOrFail($id_properti);

        $reviewTransaksi = \App\Models\Transaksi::with(['review', 'pengguna'])
            ->where('nama_properti', $properti->nama_properti)
            ->whereHas('review')
            ->get();

        return view('penyewa.properties.detail', compact('properti', 'reviewTransaksi'));
    }

    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $transaksi = Transaksi::with(['statusPembayaran', 'pengguna'])
            ->where('id_pengguna', $user->id_pengguna)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('transaksi.index', compact('transaksi'));
    }

    public function indexTransaksi()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $transaksi = Transaksi::with(['statusPembayaran', 'pengguna'])
            ->where('id_pengguna', $user->id_pengguna)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('penyewa.transaksis.index', compact('transaksi'));
    }

    public function detailTransaksi($id)
    {
        // $transaksi = Transaksi::with('review')->find($id);
        $transaksi = Transaksi::with(['review', 'statusPembayaran'])->findOrFail($id);
        return view('penyewa.transaksis.detail', compact('transaksi'));
    }

    public function createReview($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        if ($transaksi->review) {
            return redirect()->back()->with('error', 'Review sudah pernah dibuat.');
        }

        return view('penyewa.reviews.formreview', compact('transaksi'));
    }

    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:1000',
        ]);

        $transaksi = Transaksi::findOrFail($id);

        if ($transaksi->review) {
            return redirect()->back()->with('error', 'Review sudah ada untuk transaksi ini.');
        }

        Review::create([
            'id_review' => 'REV' . Str::random(10),
            'id_transaksi' => $id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('penyewa.transaksi.detail', $transaksi->id_transaksi)
        ->with('success', 'Review berhasil ditambahkan!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_status_pembayaran' => 'required|integer',
            'tanggal_pembayaran' => 'nullable|date',
            'nama_properti' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'total_harga' => 'required|numeric',
            'id_pengguna' => 'required|integer',
        ]);

        $nomorInvoice = 'NGPO-' . date('YmdHis') . '-' . strtoupper(Str::random(5));

        $transaksi = Transaksi::create([
            'id_status_pembayaran' => $request->id_status_pembayaran,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'nomor_invoice' => $nomorInvoice,
            'nama_properti' => $request->nama_properti,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'total_harga' => $request->total_harga,
            'id_pengguna' => $request->id_pengguna,
        ]);

        return redirect()->route('transaksi.detail', $transaksi->id_transaksi)
                         ->with('success', 'Transaksi berhasil dibuat dengan nomor invoice ' . $nomorInvoice);
    }
}
