@extends('penyewa.layouts.main')

@section('title', 'Detail Transaksi - Nginepo')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800">Detail Transaksi</h2>
    </div>

    <div class="px-6 py-8">
        <div class="mb-8">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Transaksi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <p class="text-sm text-gray-600">Nama Properti</p>
                    <p class="font-medium">{{ $transaksi->nama_properti }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Harga</p>
                    <p class="font-medium">Rp.{{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Tanggal Mulai</p>
                    <p class="font-medium">{{ $transaksi->tanggal_mulai->format('d/m/Y') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Tanggal Selesai</p>
                    <p class="font-medium">{{ $transaksi->tanggal_selesai->format('d/m/Y') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Status Pembayaran</p>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                        @if($transaksi->statusPembayaran->id_status == 'bayar') bg-green-100 text-green-800
                        @elseif($transaksi->statusPembayaran->id_status == 'menunggu') bg-yellow-100 text-yellow-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ $transaksi->statusPembayaran->nama_status }}
                    </span>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Nomor Invoice</p>
                    <p class="font-medium">{{ $transaksi->nomor_invoice }}</p>
                </div>
            </div>
        </div>

        <div class="border-t pt-8">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Review & Rating</h3>

            @if($transaksi->review)
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="flex items-center mb-3">
                        <div class="flex items-center">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= $transaksi->review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                     fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>
                        <span class="ml-2 text-sm text-gray-600">({{ $transaksi->review->rating }}/5)</span>
                    </div>
                    @if($transaksi->review->komentar)
                        <p class="text-gray-700">{{ $transaksi->review->komentar }}</p>
                    @endif
                    <p class="text-xs text-gray-500 mt-2">Diberikan pada {{ $transaksi->review->created_at->format('d M Y H:i') }}</p>
                </div>
            @else
                <div class="bg-white border-2 border-gray-200 rounded-lg p-6">
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form id="reviewForm" action="{{ route('penyewa.transaksi.review.store', $transaksi->id_transaksi) }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                            <div id="star-rating" class="flex space-x-1 select-none">
                                @for ($i = 1; $i <= 5; $i++)
                                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden" {{ old('rating', 0) == $i ? 'checked' : '' }}>
                                    <label for="star{{ $i }}" class="cursor-pointer text-3xl text-gray-300 transition-all duration-200">&#9733;</label>
                                @endfor
                            </div>
                            @error('rating')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="komentar" class="block text-sm font-medium text-gray-700 mb-2">Komentar (Opsional)</label>
                            <textarea id="komentar" name="komentar" rows="4"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent resize-none"
                                    placeholder="Bagikan pengalaman Anda...">{{ old('komentar') }}</textarea>
                            @error('komentar')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="submit"
                                    class="bg-[#8B4513] text-white border-2 border-[#8B4513] px-8 py-3 rounded-lg font-medium hover:bg-[#7A3E10] transition-all shadow inline-block">
                                Submit Review
                            </button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
    <a href="{{ route('penyewa.transaksi.detail', ['id' => $transaksi->id_transaksi]) }}"
    onclick="return confirm('Apakah kamu yakin ingin kembali? Review yang telah dibuat akan hilang.');">
        <button id="btn-back" type="button"
            class="pl-10 mb-4 bg-white-300 hover:text-opacity-80 text-gray-800 font-semibold py-2 px-4 rounded inline-flex items-center">
            &lt; Kembali
        </button>
    </a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('reviewForm');
        const stars = document.querySelectorAll('#star-rating label');
        const radios = document.querySelectorAll('#star-rating input[name="rating"]');

        function setStars(rating) {
            stars.forEach((star, idx) => {
                if (idx + 1 <= rating) {
                    star.classList.add('text-yellow-400');
                    star.classList.remove('text-gray-300');
                } else {
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-gray-300');
                }
            });
        }

        let oldRating = 0;
        radios.forEach(radio => {
            if (radio.checked) oldRating = parseInt(radio.value);
        });
        setStars(oldRating);

        stars.forEach((star, idx) => {
            star.addEventListener('mouseenter', () => {
                setStars(idx + 1);
            });

            star.addEventListener('mouseleave', () => {
                setStars(oldRating);
            });

            star.addEventListener('click', () => {
                oldRating = idx + 1;
                radios[idx].checked = true;
                setStars(oldRating);
            });
        });

        form.addEventListener('submit', function (e) {
            const isChecked = Array.from(radios).some(radio => radio.checked);
            if (!isChecked) {
                e.preventDefault();
                alert('Silakan pilih rating bintang terlebih dahulu!');
            }
        });
    });
</script>
@endsection
