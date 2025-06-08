@extends('penyewa.layouts.main')

@section('title', $properti->nama_properti . ' - Nginepô')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8">
    <div class="mb-8">
        <form method="GET" action="{{ route('penyewa.properti.index') }}" class="max-w-2xl mx-auto">
            <div class="relative">
                <input
                    type="text"
                    name="lokasi"
                    placeholder="Cari berdasarkan lokasi..."
                    class="w-full px-6 py-4 text-lg border-2 border-gray-300 rounded-full focus:outline-none focus:border-brown-500 shadow-sm"
                >
                <button type="submit" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-brown-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <h1 class="text-3xl font-bold text-brown-900 mb-8">Detail Penginapan</h1>

    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
            <div class="aspect-w-16 aspect-h-12">
                <img src="{{ asset('storage/' . $properti->foto) }}"
                     alt="{{ $properti->nama_properti }}"
                     class="w-full h-80 object-cover rounded-lg shadow-md"
                     onerror="this.src='https://via.placeholder.com/600x400/e5e7eb/9ca3af?text=No+Image'">
            </div>

            <div class="space-y-6">
                <h2 class="text-2xl font-bold text-brown-900">{{ $properti->nama_properti }}</h2>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg border">
                        <p class="text-gray-800">{{ $properti->lokasi }}</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Maksimum Tamu</label>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg border">
                        <p class="text-gray-800">{{ $properti->maksimum_tamu }} tamu</p>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg border">
                        <p class="text-gray-800">{{ $properti->deskripsi }}</p>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg border">
                        <p class="text-gray-800">{{ $properti->formatted_harga }} per malam</p>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ketersediaan</label>
                    <div class="bg-gray-50 px-4 py-3 rounded-lg border">
                        <span class="px-3 py-1 {{ $properti->status->nama_status == 'tersedia' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} rounded-full text-sm font-medium">
                            {{ ucfirst($properti->status->nama_status) }}
                        </span>
                    </div>
                </div>
                @if($properti->status->nama_status == 'tersedia')
                    <button class="w-full bg-brown-900 text-white py-3 px-6 rounded-lg font-semibold hover:bg-brown-800 transition-colors">
                        Booking
                    </button>
                @else
                    <button class="w-full bg-gray-400 text-white py-3 px-6 rounded-lg font-semibold cursor-not-allowed" disabled>
                        Tidak Tersedia
                    </button>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-12 space-y-6">
        <h3 class="text-2xl font-bold text-brown-900">Ulasan</h3>

        @if($reviewTransaksi->isEmpty())
            <p class="text-gray-600 italic">Belum ada review untuk properti ini.</p>
        @else
            @foreach($reviewTransaksi as $t)
                <div class="bg-gray-100 rounded-lg p-4 shadow">
                    <p class="font-semibold text-brown-800">
                        {{ $t->pengguna->nama ?? 'Anonim' }}
                    </p>
                    <p class="text-yellow-600">Rating: {{ $t->review->rating }} / 5</p>
                    <p class="text-gray-700">{{ $t->review->komentar }}</p>
                </div>
            @endforeach
        @endif
    </div>

    <div class="mt-8">
        <a href="{{ route('penyewa.properti.index') }}" class="inline-flex items-center px-4 py-2 text-brown-900 bg-white border border-brown-300 rounded-lg hover:bg-brown-50 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>
</div>
@endsection
