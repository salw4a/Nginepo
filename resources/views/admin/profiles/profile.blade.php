@extends('admin.layouts.main')
@section('title', 'Profile Admin')
@section('content')

<div class="flex flex-col items-center min-h-screen py-10 bg-white">
    <!-- Foto Profil -->
    <div class="mb-6">
        <img src="{{ asset('path/to/profile-image.png') }}" alt="Profile Picture"
            class="w-32 h-32 rounded-full object-cover" />
    </div>

    <!-- Form Profil -->
    <form class="w-full max-w-md">
        <!-- Nama -->
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" id="nama" name="nama"
                class="w-full px-4 py-2 rounded-md bg-[#c49a7d] text-black focus:outline-none" />
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" name="email"
                class="w-full px-4 py-2 rounded-md bg-[#c49a7d] text-black focus:outline-none" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" id="password" name="password"
                class="w-full px-4 py-2 rounded-md bg-[#c49a7d] text-black focus:outline-none" />
        </div>

        <!-- Nomor HP -->
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
            <input type="text" id="phone" name="phone"
                class="w-full px-4 py-2 rounded-md bg-[#c49a7d] text-black focus:outline-none" />
        </div>

        <!-- Alamat -->
        <div class="mb-6">
            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <input type="text" id="alamat" name="alamat"
                class="w-full px-4 py-2 rounded-md bg-[#c49a7d] text-black focus:outline-none" />
        </div>

        <!-- Tombol Edit -->
        <div class="flex justify-end">
            <button type="submit"
                class="bg-[#4B2E18] text-white font-semibold py-2 px-6 rounded hover:bg-[#3a2213] transition">
                Edit
            </button>
        </div>
    </form>
</div>

@endsection
