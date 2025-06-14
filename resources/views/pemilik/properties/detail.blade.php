@extends('pemilik.layouts.main')

@section('title', $properti->nama_properti . ' - Nginepô')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8">
    <div class="mb-8">
        <form method="GET" action="{{ route('pemilik.properti.index') }}" class="max-w-2xl mx-auto">
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
                <img src="{{$properti->foto}}"
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
                        <span class="px-3 py-1 {{ $properti->status->nama_status_properti == 'tersedia' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} rounded-full text-sm font-medium">
                            {{ ucfirst($properti->status->nama_status_properti) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 pb-0">
            <div class="flex justify-end my-4">
                <a href="{{ route('pemilik.properti.edit', ['id' => $properti->id_properti]) }}"
                class="inline-block text-white px-6 py-3 rounded-full text-lg font-semibold hover:bg-amber-700 transition my-4"
                style="background-color: #7B3F00;">
                    Edit
                </a>
            </div>
        </div>

        <div class="mt-4 space-y-6">
            <h3 class="text-2xl font-bold text-brown-900">Ulasan</h3>
            <div class="space-y-4">

                @forelse($ulasan as $transaksi)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-brown-900 rounded-full flex items-center justify-center text-white font-semibold flex-shrink-0">
                                {{ strtoupper(substr($transaksi->pengguna->nama, 0, 1)) }}
                            </div>

                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="text-sm text-gray-800 font-bold">{{ $transaksi->pengguna->nama ?? 'Pengguna Anonim' }}</p>
                                    <span class="text-sm text-gray-500">{{ $transaksi->review->created_at->format('d/m/Y') }}</span>
                                </div>

                                <div class="flex items-center space-x-2 mb-2">
                                    <div class="flex text-yellow-400">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $transaksi->review->rating)
                                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                </svg>
                                            @else
                                                <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 20 20">
                                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                                </svg>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-gray-700">{{ $transaksi->review->komentar }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-6 rounded-lg shadow-md text-center">
                        <p class="text-gray-500 italic">Belum ada ulasan untuk properti ini.</p>
                    </div>
                @endforelse

            </div>
        </div>

    <div class="mt-8">
        <a href="{{ route('pemilik.properti.index') }}" class="inline-flex items-center px-4 py-2 text-brown-900 bg-white border border-brown-300 rounded-lg hover:bg-brown-50 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>
</div>
@endsection
