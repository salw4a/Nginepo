@extends('penyewa.layouts.main')
@section('title', 'Profile Penyewa')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Foto Profil -->
    <div class="flex justify-center mb-12">
        <img src="{{ asset('/') }}" alt="Foto Profil" class="w-40 h-40 rounded-full object-cover shadow-lg">
    </div>

    <!-- Form Profil -->
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama -->
            <div>
                <label class="block text-[#5B3A29] font-semibold mb-2">Nama</label>
                <input type="text" value="Tiara Salsabella" class="w-full bg-[#8B6651] text-white rounded-lg p-3" disabled>
            </div>
            <!-- Email -->
            <div>
                <label class="block text-[#5B3A29] font-semibold mb-2">Email</label>
                <input type="email" value="tiara@mail.com" class="w-full bg-[#8B6651] text-white rounded-lg p-3" disabled>
            </div>
            <!-- Password -->
            <div>
                <label class="block text-[#5B3A29] font-semibold mb-2">Password</label>
                <input type="password" value="password" class="w-full bg-[#8B6651] text-white rounded-lg p-3" disabled>
            </div>
            <!-- Nomor HP -->
            <div>
                <label class="block text-[#5B3A29] font-semibold mb-2">Nomor HP</label>
                <input type="text" value="0896xxxxxxx" class="w-full bg-[#8B6651] text-white rounded-lg p-3" disabled>
            </div>
            <!-- Alamat -->
            <div class="md:col-span-2">
                <label class="block text-[#5B3A29] font-semibold mb-2">Alamat</label>
                <input type="text" value="Jl. Kalimantan No. 37, Jember" class="w-full bg-[#8B6651] text-white rounded-lg p-3" disabled>
            </div>
        </div>

        <!-- Tombol Edit -->
        <div class="flex justify-end mt-8">
            <a href="{{ route('penyewa.profiles.editprofile') }}">
                <button class="bg-[#5B3A29] text-white font-semibold py-2 px-6 rounded-lg hover:bg-[#4A2F22] transition">
                    Edit
                </button>
            </a>
        </div>
    </div>
</div>
@endsection
