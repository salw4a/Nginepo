@extends('penyewa.layouts.main')
@section('title', 'Profil Saya - Nginepô')

@section('content')
<div class="max-w-4xl mx-auto p-6 sm:p-8 bg-white rounded-lg shadow">

    <div class="mb-12 text-center">
        <h1 class="text-3xl font-bold text-gray-800">Profil Saya</h1>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            <strong class="font-bold">Berhasil!</strong>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex justify-center mb-12">
        <div class="relative w-40 h-40">
            @if ($user->foto_profil)
                <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Profil" class="w-full h-full rounded-full object-cover shadow-lg">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->nama) }}&background=6a4f4b&color=fff&size=160"
                     alt="Profil" class="w-full h-full rounded-full object-cover shadow-lg">
            @endif
        </div>
    </div>

    <div class="max-w-3xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">

            <div class="space-y-8">
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Nama</label>
                    <p class="text-lg font-semibold text-gray-800 p-3 bg-gray-50 rounded-lg">{{ $user->nama }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Password</label>
                    <p class="text-lg font-semibold text-gray-800 p-3 bg-gray-50 rounded-lg">••••••••</p>
                </div>
            </div>

            <div class="space-y-8">
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                    <p class="text-lg font-semibold text-gray-800 p-3 bg-gray-50 rounded-lg">{{ $user->email }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Nomor HP</label>
                    <p class="text-lg font-semibold text-gray-800 p-3 bg-gray-50 rounded-lg">{{ $user->telepon }}</p>
                </div>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-500 mb-1">Alamat</label>
                <p class="text-lg font-semibold text-gray-800 p-3 bg-gray-50 rounded-lg min-h-[50px]">{{ $user->alamat ?? 'Belum diatur' }}</p>
            </div>
        </div>

        <div class="mt-12 flex justify-end">
            <a href="{{ route('penyewa.profile.edit') }}"
               class="bg-[#4D2C0C] text-white font-bold py-3 px-10 rounded-lg shadow-md hover:bg-[#3e2409] transition-colors">
                Edit Profil
            </a>
        </div>
    </div>
</div>
@endsection
