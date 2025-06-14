@extends('pemilik.layouts.main')
@section('title', 'Edit Profil - Nginepô')

@section('content')
<div class="max-w-4xl mx-auto p-6 sm:p-8 bg-white rounded-lg shadow">

    <div class="mb-12 text-center">
        <h1 class="text-3xl font-bold text-gray-800">Edit Profil</h1>
        <p class="text-gray-500 mt-2">Perbarui informasi profil dan foto Anda di sini.</p>
    </div>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
            <strong class="font-bold">Oops! Terjadi kesalahan.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            <strong class="font-bold">Berhasil!</strong>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form method="POST" action="{{ route('pemilik.profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="flex justify-center mb-12">
            <div class="relative w-40 h-40">
                <img id="image_preview"
                    src="{{ $user->foto_profil ? asset('storage/' . $user->foto_profil) : 'https://ui-avatars.com/api/?name=' . urlencode($user->nama) . '&background=6a4f4b&color=fff&size=160' }}"
                    alt="Profil" class="w-full h-full rounded-full object-cover shadow-lg">
            </div>
        </div>

        <div class="flex justify-center mb-4">
            <label for="foto_profil"
                class="cursor-pointer bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                Ganti Foto
            </label>
            <input id="foto_profil" name="foto_profil" type="file" class="sr-only" onchange="previewImage(event)">
        </div>
        @error('foto_profil')
            <p class="text-center text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        <p class="text-center text-xs text-gray-500 mb-10">Kosongkan jika tidak ingin mengubah foto.</p>

        <div class="max-w-3xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">

                <div class="space-y-8">
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-500 mb-1">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $user->nama) }}"
                            class="w-full text-lg font-semibold text-gray-800 p-3 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#4D2C0C] focus:border-[#4D2C0C]"
                            required>
                        @error('nama')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kata_sandi" class="block text-sm font-medium text-gray-500 mb-1">kata_sandi Baru</label>
                        <input type="password" name="kata_sandi" id="kata_sandi" autocomplete="new-password"
                            class="w-full text-lg text-gray-800 p-3 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#4D2C0C] focus:border-[#4D2C0C]">
                        @error('kata_sandi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Total Properti</label>
                        <p class="w-full text-lg font-semibold text-gray-800 p-3 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#4D2C0C] focus:border-[#4D2C0C]">{{ $user->jumlah_properti }}</p>
                    </div>
                </div>

                <div class="space-y-8">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                            class="w-full text-lg font-semibold text-gray-800 p-3 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#4D2C0C] focus:border-[#4D2C0C]"
                            required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kata_sandi_confirmation" class="block text-sm font-medium text-gray-500 mb-1">Konfirmasi kata_sandi Baru</label>
                        <input type="password" name="kata_sandi_confirmation" id="kata_sandi_confirmation" autocomplete="new-password"
                            class="w-full text-lg text-gray-800 p-3 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#4D2C0C] focus:border-[#4D2C0C]">
                    </div>

                    <div>
                        <label for="telepon" class="block text-sm font-medium text-gray-500 mb-1">Nomor HP</label>
                        <input type="tel" name="telepon" id="telepon" value="{{ old('telepon', $user->telepon) }}"
                            class="w-full text-lg font-semibold text-gray-800 p-3 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#4D2C0C] focus:border-[#4D2C0C]">
                        @error('telepon')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="md:col-span-2">
                    <label for="alamat" class="block text-sm font-medium text-gray-500 mb-1">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3"
                        class="w-full text-lg font-semibold text-gray-800 p-3 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#4D2C0C] focus:border-[#4D2C0C]">{{ old('alamat', $user->alamat) }}</textarea>
                    @error('alamat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-12 flex items-center justify-end gap-x-4">
                <a href="{{ route('pemilik.profile.show') }}"
                   class="text-gray-600 font-bold py-3 px-10"
                   onclick="return confirm('Apakah Anda yakin ingin membatalkan perubahan? Semua data yang belum disimpan akan hilang.');">
                    Batal
                </a>
                <button type="submit"
                    class="bg-[#4D2C0C] text-white font-bold py-3 px-10 rounded-lg shadow-md hover:bg-[#3e2409] transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('image_preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
