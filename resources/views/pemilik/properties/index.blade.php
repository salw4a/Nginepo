@extends('pemilik.layouts.main')

@section('title', 'Penginapan di Jember - Nginepô')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8">
    <div class="mb-8">
        <form method="GET" action="{{ route('pemilik.properti.index') }}" class="max-w-2xl mx-auto">
            <div class="relative">
                <input
                    type="text"
                    name="lokasi"
                    value="{{ request('lokasi') }}"
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

    <div class="mb-8">
        <h3 class="text-lg font-semibold text-brown-900 mb-4">Filter Lokasi:</h3>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('pemilik.properti.index') }}"
               class="px-4 py-2 rounded-full border {{ !request('lokasi') ? 'bg-brown-900 text-white' : 'bg-white text-brown-900 border-brown-300' }} hover:bg-brown-800 hover:text-white transition-colors">
                Semua
            </a>
            @foreach($lokasi as $loc)
                <a href="{{ route('pemilik.properti.index', ['lokasi' => $loc]) }}"
                   class="px-4 py-2 rounded-full border {{ request('lokasi') == $loc ? 'bg-brown-900 text-white' : 'bg-white text-brown-900 border-brown-300' }} hover:bg-brown-800 hover:text-white transition-colors">
                    {{ $loc }}
                </a>
            @endforeach
        </div>
    </div>

    <h1 class="text-3xl font-bold text-brown-900 mb-8">Penginapan di Jember</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($properti as $item)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow cursor-pointer"
                 onclick="window.location='{{ route('pemilik.properti.detail', $item->id_properti) }}'">
                <div class="aspect-w-16 aspect-h-12 bg-gray-200">
                    <img src="{{ $item->foto }}"
                         alt="{{ $item->nama_properti }}"
                         class="w-full h-48 object-cover"
                         onerror="this.src='https://via.placeholder.com/400x300/e5e7eb/9ca3af?text=No+Image'">
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg text-brown-900 mb-2">{{ $item->nama_properti }}</h3>
                    <p class="text-gray-600 mb-3">{{ $item->formatted_harga }} per malam</p>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>{{ $item->maksimum_tamu }} tamu</span>
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">
                            {{ $item->status->nama_status }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">Tidak ada properti ditemukan.</p>
            </div>
        @endforelse
    </div>
    <div class="max-w-7xl mx-auto px-6 pb-8">
        <div class="flex justify-end my-4">
            <a href="{{ route('pemilik.properti.create') }}"
            class="inline-block text-white px-6 py-3 rounded-full text-lg font-semibold hover:bg-amber-700 transition my-4"
            style="background-color: #7B3F00;">
                Buat Katalog
            </a>
        </div>
    </div>
</div>
@endsection
