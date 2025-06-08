@extends('penyewa.layouts.main')
@section('title', 'Riwayat Transaksi - Nginepo')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800">Riwayat Transaksi</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-orange-100">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Nama Properti</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Mulai</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Selesai</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Total Harga</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-700">Detail</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($transaksi as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $item->nama_properti }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->tanggal_mulai->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $item->tanggal_selesai->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 font-medium">Rp.{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('penyewa.transaksi.detail', $item->id_transaksi) }}"
                           class="btn-detail text-black px-4 py-2 rounded-lg text-sm font-medium hover:shadow-lg transition-all duration-300">
                            Lihat
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
