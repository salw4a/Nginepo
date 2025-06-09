@extends('penyewa.layouts.main')
@section('title', 'Edit Profil Penyewa')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Foto Profil -->
    <div class="flex justify-center mb-12">
        {{-- <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/default-profile.png') }}" alt="Foto Profil" class="w-40 h-40 rounded-full object-cover shadow-lg"> --}}
    </div>

    <!-- Form Edit Profil -->
    <form action="{{ route('penyewa.profiles.update') }}" method="POST" class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama -->
            <div>
                <label for="name" class="block text-[#5B3A29] font-semibold mb-2">Nama</label>
                {{-- <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-[#8B6651] text-white rounded-lg p-3" required> --}}
            </div>
            <!-- Email -->
            <div>
                <label for="email" class="block text-[#5B3A29] font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $penyewa->email) }}" class="w-full bg-[#8B6651] text-white rounded-lg p-3" required>
            </div>
            <!-- Password -->
            <div>
                <label for="password" class="block text-[#5B3A29] font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah" class="w-full bg-[#8B6651] text-white rounded-lg p-3">
            </div>
            <!-- Nomor HP -->
            <div>
                <label for="phone" class="block text-[#5B3A29] font-semibold mb-2">Nomor HP</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $penyewa->phone) }}" class="w-full bg-[#8B6651] text-white rounded-lg p-3" required>
            </div>
            <!-- Alamat -->
            <div class="md:col-span-2">
                <label for="address" class="block text-[#5B3A29] font-semibold mb-2">Alamat</label>
                <input type="text" id="address" name="address" value="{{ old('address', $penyewa->address) }}" class="w-full bg-[#8B6651] text-white rounded-lg p-3" required>
            </div>
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-end mt-8 space-x-4">
            {{-- <a href="{{ route('penyewa.profile.index') }}"> --}}
                <button type="button" class="bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-lg hover:bg-gray-400 transition">
                    Batal
                </button>
            </a>
            <button type="submit" class="bg-[#5B3A29] text-white font-semibold py-2 px-6 rounded-lg hover:bg-[#4A2F22] transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
