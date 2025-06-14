@extends('admin.layouts.main')
@section('title', 'Manajemen Properti')
@section('content')

<div class="p-6 space-y-6">

    {{-- Filter Status --}}
    <div class="inline-flex items-center gap-4 bg-[#C49B7F] px-5 py-3 rounded-md">
        <span class="text-white font-semibold">Status</span>
        <label class="inline-flex items-center text-white gap-1">
            <input type="radio" name="status" value="semua" class="form-radio text-[#5C3A28]" checked>
            <span>semua</span>
        </label>
        <label class="inline-flex items-center text-white gap-1">
            <input type="radio" name="status" value="terverifikasi" class="form-radio text-[#5C3A28]">
            <span>terverifikasi</span>
        </label>
        <label class="inline-flex items-center text-white gap-1">
            <input type="radio" name="status" value="belum_terverifikasi" class="form-radio text-[#5C3A28]">
            <span>belum terverifikasi</span>
        </label>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 shadow">
            <thead class="bg-[#C49B7F] text-white">
                <tr>
                    <th class="py-3 px-4 text-left border">No.</th>
                    <th class="py-3 px-4 text-left border">Properti</th>
                    <th class="py-3 px-4 text-left border">Email</th>
                    <th class="py-3 px-4 text-left border">Detail</th>
                </tr>
            </thead>
            <tbody class="text-[#5C3A28]">
                {{-- Data dinamis akan di-query dan ditampilkan di sini --}}
                @foreach ($propertis as $index => $properti)
                <tr class="border-b">
                    <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 border">{{ $properti->nama }}</td>
                    <td class="py-2 px-4 border">{{ $properti->email }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('admin.properti.show', $properti->id) }}"
                           class="bg-[#5C3A28] text-white px-4 py-1 rounded-md shadow hover:bg-[#472a1e]">
                           Detail
                        </a>
                    </td>
                </tr>
                @endforeach

                {{-- Kosong jika belum ada data --}}
                @if ($propertis->isEmpty())
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">Tidak ada data properti.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection

