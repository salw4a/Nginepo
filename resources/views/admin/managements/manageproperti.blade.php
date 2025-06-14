@extends('admin.layouts.main')
@section('title', 'Manajemen Properti - Nginepo')
@section('content')

<div class="bg-white rounded-lg shadow-sm border border-brown/10">
    <div class="px-6 py-4 border-b border-brown/10">
        <h1 class="text-2xl font-semibold text-brown">Manajemen Properti</h1>
        <p class="text-gray-600 mt-1">Kelola semua properti di platform Nginepo</p>
    </div>

    <!-- Filter Verifikasi -->
    <div class="px-6 py-4 border-b border-gray-100">
        <form method="GET" action="{{ route('admin.managements.manageproperti') }}">
            <div class="flex flex-wrap gap-2">
                <div class="flex">
                    <input type="radio" class="sr-only peer" name="verifikasi" id="semua" value="" {{ request('verifikasi') == '' ? 'checked' : '' }} onchange="this.form.submit()">
                    <label class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-l-lg border border-amber-300 bg-white text-amber-700 cursor-pointer hover:bg-amber-50 peer-checked:bg-amber-200 peer-checked:text-amber-800 peer-checked:border-amber-400 transition-colors duration-150" for="semua">
                        Semua
                    </label>
                </div>
                @foreach($verifikasiProperti as $verifikasi)
                <div class="flex">
                    <input type="radio" class="sr-only peer" name="verifikasi" id="verifikasi_{{ $verifikasi->id_verifikasi_properti }}" value="{{ $verifikasi->id_verifikasi_properti }}" {{ request('verifikasi') == $verifikasi->id_verifikasi_properti ? 'checked' : '' }} onchange="this.form.submit()">
                    <label class="inline-flex items-center px-4 py-2 text-sm font-medium border border-amber-300 bg-white text-amber-700 cursor-pointer hover:bg-amber-50 peer-checked:bg-amber-200 peer-checked:text-amber-800 peer-checked:border-amber-400 transition-colors duration-150 {{ $loop->last ? 'rounded-r-lg' : '' }}" for="verifikasi_{{ $verifikasi->id_verifikasi_properti }}">
                        {{ ucfirst(str_replace('_', ' ', $verifikasi->nama_verifikasi_properti)) }}
                    </label>
                </div>
                @endforeach
            </div>
        </form>
    </div>

    <!-- Tabel Properti -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-amber-100">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-brown border-r border-amber-200">No.</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-brown border-r border-amber-200">Properti</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-brown border-r border-amber-200">Lokasi</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-brown">Detail</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($properti as $index => $item)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 text-sm text-gray-900 border-r border-gray-100">
                        {{ $loop->iteration }}.
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 border-r border-gray-100">
                        {{ $item->nama_properti }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900 border-r border-gray-100">
                        {{ Str::limit($item->lokasi, 20) }}
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <a href="{{ route('admin.managements.detailmanageproperti', $item->id_properti) }}"
                           class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-1">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-12">
                        <div class="text-gray-400">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mt-4">Tidak ada data properti</h3>
                            <p class="text-gray-500">Data properti akan muncul di sini.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
