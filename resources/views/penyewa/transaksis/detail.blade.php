@extends('penyewa.layouts.main')

@section('content')
<div class="mt-6 mb-6 pl-10">
    <h1 class="text-2xl font-bold text-brown pl-40">Detail Transaksi</h1>
</div>

<div class="bg-white rounded-3xl shadow-lg p-8 max-w-5xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="space-y-4">
            <div class="aspect-w-16 aspect-h-12 rounded-2xl overflow-hidden mt-20">
                @if($transaksi->gambar_homestay)
                    <img src="{{ asset($transaksi->gambar_homestay) }}"
                         alt="{{ $transaksi->nama_homestay }}"
                         class="w-full h-80 object-cover rounded-2xl">
                @else
                    <div class="w-full h-80 bg-gray-200 rounded-2xl flex items-center justify-center">
                        <span class="text-gray-400">No Image</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="space-y-6">
            <h2 class="class=text-2xl md:text-3xl font-bold text-center text-brow">{{ $transaksi->nama_properti ?? 'GAK ADA NAMANYA' }}</h2>

            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Nomor Invoice</label>
                <div class="bg-gray-50 rounded-lg px-4 py-3 border border-brown">
                    <span class="text-gray-900">{{ $transaksi->nomor_invoice }}</span>
                </div>
                            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Nama Penyewa</label>
                <div class="bg-gray-50 rounded-lg px-4 py-3 border border-brown">
                    <span class="text-gray-900">{{ $transaksi->pengguna->nama }}</span>
                </div>
            </div>
                        <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Tanggal Pembayaran</label>
                <div class="bg-gray-50 rounded-lg px-4 py-3 border border-brown">
                    <span class="text-gray-900">{{ $transaksi->tanggal_pembayaran}}</span>
                </div>
            </div>
                        <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Mulai</label>
                <div class="bg-gray-50 rounded-lg px-4 py-3 border border-brown">
                    <span class="text-gray-900">{{ $transaksi->tanggal_mulai }}</span>
                </div>
            </div>
                        <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Selesai</label>
                <div class="bg-gray-50 rounded-lg px-4 py-3 border border-brown">
                    <span class="text-gray-900">{{ $transaksi->tanggal_selesai}}</span>
                </div>
            </div>
                        <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">Total harga</label>
                <div class="bg-gray-50 rounded-lg px-4 py-3 border border-brown">
                    <span class="text-gray-900">{{ $transaksi->total_harga }}</span>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="mt-8">
        @if($transaksi->review)
            <h2 class="text-xl font-bold text-brown mb-4">Ulasan Anda</h2>
            <div class="bg-gray-100 p-4 rounded-xl">
                <p class="text-yellow-500 mb-1">Rating: {{ $transaksi->review->rating }}/5</p>
                <p class="text-gray-700">{{ $transaksi->review->komentar }}</p>
            </div>
        @elseif ($transaksi->statusPembayaran)
            @if (strtolower($transaksi->statusPembayaran->nama_status_pembayaran) === 'bayar')
            <div class="flex justify-end">
                <a href="{{ route('penyewa.transaksi.review.create', ['id' => $transaksi->id_transaksi]) }}"
                class="bg-[#8B4513] text-white border-2 border-[#8B4513] px-8 py-3 rounded-lg font-medium hover:bg-[#7A3E10] transition-all shadow inline-block">
                Review
                </a>
            </div>
            @endif
        @endif
    </div>

</div>

<div class="mt-8 flex justify-start">
    <a href="{{ route('penyewa.transaksi.index') }}"
        class="text-brown hover:text-opacity-80 font-medium flex items-center pl-40">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Kembali
    </a>
</div>
@endsection
