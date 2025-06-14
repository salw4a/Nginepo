@extends('pemilik.layouts.main')

@section('title', 'Edit ' . $properti->nama_properti . ' - Nginepô')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-brown-900">Edit Properti</h1>
        <p class="text-gray-600 mt-2">Perbarui informasi properti Anda</p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('pemilik.properti.update', $properti->id_properti) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-lg p-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div>
                    <label for="nama_properti" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Properti <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="nama_properti"
                           name="nama_properti"
                           value="{{ old('nama_properti', $properti->nama_properti) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brown-500 focus:border-transparent @error('nama_properti') border-red-500 @enderror"
                           placeholder="Masukkan nama properti">
                    @error('nama_properti')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">
                        Lokasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="lokasi"
                           name="lokasi"
                           value="{{ old('lokasi', $properti->lokasi) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brown-500 focus:border-transparent @error('lokasi') border-red-500 @enderror"
                           placeholder="Masukkan lokasi properti">
                    @error('lokasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="maksimum_tamu" class="block text-sm font-medium text-gray-700 mb-2">
                        Maksimum Tamu <span class="text-red-500">*</span>
                    </label>
                    <input type="number"
                           id="maksimum_tamu"
                           name="maksimum_tamu"
                           value="{{ old('maksimum_tamu', $properti->maksimum_tamu) }}"
                           min="1"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brown-500 focus:border-transparent @error('maksimum_tamu') border-red-500 @enderror"
                           placeholder="Jumlah maksimum tamu">
                    @error('maksimum_tamu')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-700 mb-2">
                        Harga per Malam <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                        <input type="number"
                               id="harga"
                               name="harga_per_malam"
                               value="{{ old('harga_per_malam', $properti->harga_per_malam) }}"
                               min="0"
                               class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brown-500 focus:border-transparent @error('harga') border-red-500 @enderror"
                               placeholder="0">
                    </div>
                    @error('harga_per_malam')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Status Ketersediaan <span class="text-red-500">*</span>
                    </label>
                        <select id="status_id"
                            name="status_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white text-black focus:outline-none focus:ring-2 focus:ring-brown-500 focus:border-transparent @error('status_id') border-red-500 @enderror">
                            <option value="">Pilih Status</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id_status_properti }}"
                                    {{ old('status_id', $properti->status_id) == $status->id_status_properti ? 'selected' : '' }}>
                                    {{ ucfirst($status->nama_status_properti) }}
                                </option>
                            @endforeach
                        </select>
                    @error('status_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="space-y-6">
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea id="deskripsi"
                              name="deskripsi"
                              rows="5"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brown-500 focus:border-transparent @error('deskripsi') border-red-500 @enderror"
                              placeholder="Masukkan deskripsi properti">{{ old('deskripsi', $properti->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Foto Saat Ini</label>
                    <div class="bg-gray-50 p-4 rounded-lg border">
                        <img src="{{ asset('storage/' . $properti->foto) }}"
                             alt="{{ $properti->nama_properti }}"
                             class="w-full h-48 object-cover rounded-lg"
                             onerror="this.src='https://via.placeholder.com/400x300/e5e7eb/9ca3af?text=No+Image'">
                    </div>
                </div>

                <div>
                    <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">
                        Upload Foto Baru (Opsional)
                    </label>
                    <input type="file"
                           id="foto"
                           name="foto"
                           accept="image/*"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-brown-500 focus:border-transparent @error('foto') border-red-500 @enderror">
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, maksimal 2MB</p>
                    @error('foto')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center mt-8 pt-6 border-t border-gray-200">
            <a href="{{ route('pemilik.properti.detail', ['id_properti' => $properti->id_properti]) }}"
            onclick="return confirm('Apakah kamu yakin ingin kembali? Perubahan yang belum disimpan akan hilang.')"
            class="inline-flex items-center px-6 py-3 text-brown-900 bg-white border border-brown-300 rounded-lg hover:bg-brown-50 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>


            <div class="flex space-x-4">
                <button type="reset"
                        class="px-6 py-3 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors">
                    Reset
                </button>
                <button type="submit"
                        class="px-6 py-3 text-white rounded-lg font-semibold hover:bg-amber-700 transition-colors"
                        style="background-color: #7B3F00;">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const firstError = document.querySelector('.border-red-500');
        if (firstError) {
            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    });
</script>
@endsection
