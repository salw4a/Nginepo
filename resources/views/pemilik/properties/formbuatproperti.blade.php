@extends('pemilik.layouts.main')

@section('title','Tambah Properti - Nginepô')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Tambah Katalog</h1>
        <form action="{{ route('pemilik.properti.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="nama_properti" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Properti
                </label>
                <input type="text"
                       id="nama_properti"
                       name="nama_properti"
                       value="{{ old('nama_properti') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-wood focus:border-transparent"
                       required>
                @error('nama_properti')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">
                    Lokasi
                </label>
                <input type="text"
                       id="lokasi"
                       name="lokasi"
                       value="{{ old('lokasi') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-wood focus:border-transparent">
                @error('lokasi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="harga_per_malam" class="block text-sm font-medium text-gray-700 mb-2">
                    Harga per malam
                </label>
                <input type="number"
                       id="harga_per_malam"
                       name="harga_per_malam"
                       value="{{ old('harga_per_malam') }}"
                       min="0"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-wood focus:border-transparent"
                       required>
                @error('harga_per_malam')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="maksimum_tamu" class="block text-sm font-medium text-gray-700 mb-2">
                    Maksimum Tamu
                </label>
                <input type="number"
                       id="maksimum_tamu"
                       name="maksimum_tamu"
                       value="{{ old('maksimum_tamu') }}"
                       min="1"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-wood focus:border-transparent"
                       required>
                @error('maksimum_tamu')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                    Ketersediaan
                </label>
                <select id="status"
                        name="status"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-wood focus:border-transparent"
                        required>
                    <option value="">Pilih Status</option>
                    <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="tidak_tersedia" {{ old('status') == 'tidak_tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                    Deskripsi
                </label>
                <textarea id="deskripsi"
                          name="deskripsi"
                          rows="4"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-wood focus:border-transparent">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-wood transition duration-200">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="foto" class="block text-sm font-medium text-gray-700 mb-2 cursor-pointer">
                                <span>Upload</span>
                                <input type="file"
                                       id="foto"
                                       name="foto"
                                       accept="image/*"
                                       class="hidden"
                                >
                            </label>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>

                        <div class="file-preview-container mt-4"></div>
                    </div>
                </div>
                @error('foto')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4 pt-6">
                <a href="{{ route('pemilik.properti.index') }}"
                   class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                    Batal
                </a>
                <button type="submit"
                        class="bg-wood hover:bg-opacity-300 text-gray px-6 py-3 rounded-lg font-medium transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('foto').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.createElement('img');
            preview.src = e.target.result;
            preview.className = 'mt-4 max-w-xs rounded-lg shadow-md';

            const existingPreview = document.querySelector('.file-preview');
            if (existingPreview) {
                existingPreview.remove();
            }

            preview.className += ' file-preview';
            document.querySelector('input[type="file"]').closest('.space-y-1').appendChild(preview);
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
