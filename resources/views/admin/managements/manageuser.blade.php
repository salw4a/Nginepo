@extends('admin.layouts.main')
@section('title', 'Manajemen User - Nginepo')
@section('content')
<div class="bg-white rounded-lg shadow-sm border border-brown/10">
    <div class="px-6 py-4 border-b border-brown/10">
        <h1 class="text-2xl font-semibold text-brown">Daftar User</h1>
        <p class="text-gray-600 mt-1">Kelola semua pengguna platform Nginepo</p>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-amber-100">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-brown border-r border-amber-200">No.</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-brown border-r border-amber-200">Nama</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-brown border-r border-amber-200">Email</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-brown">Role</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($users as $user)
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 text-sm text-gray-900 border-r border-gray-100">
                        {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}.
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 border-r border-gray-100">
                        {{ $user->nama }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900 border-r border-gray-100">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4 text-sm">
                        @php
                            $roleName = $user->role->nama_role ?? ($user instanceof \App\Models\Pemilik ? 'pemilik' : 'tanpa role');
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            @if($roleName === 'admin') bg-red-100 text-red-800
                            @elseif($roleName === 'pemilik') bg-blue-100 text-blue-800
                            @elseif($roleName === 'penyewa') bg-green-100 text-green-800
                            @else bg-gray-200 text-gray-500
                            @endif">
                            {{ ucfirst($roleName) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-12">
                        <div class="text-gray-400">
                            <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mt-4">Belum ada pengguna</h3>
                            <p class="text-gray-500">Data pengguna akan muncul di sini.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-100">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-700">
                Menampilkan <span class="font-medium">{{ $users->firstItem() }}</span> - <span class="font-medium">{{ $users->lastItem() }}</span> dari <span class="font-medium">{{ $users->total() }}</span> pengguna
            </div>
            <div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
