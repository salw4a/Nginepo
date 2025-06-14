@extends('penyewa.layouts.main')

@section('title', 'Beranda - Nginepo')

@section('content')
<!-- Hero Section -->
<section class="relative h-screen bg-cover bg-center bg-no-repeat" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ asset('images/bghome.png') }}');">
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Selamat Datang!</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">
                Dengan Nginepo, penyewaan tempat penginapan dapat dilakukan dimana saja dan kapan saja
            </p>
            <a href="{{route('penyewa.properti.index')}}" class="inline-block bg-amber-800 hover:bg-amber-900 text-white font-bold py-4 px-8 rounded-full text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                Booking sekarang
            </a>
        </div>
    </div>
</section>

<section id="katalog" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-4xl font-bold text-amber-800">Penginapan popular di Jember</h2>
            <a href="{{ route('penyewa.properti.index') }}" class="text-amber-800 hover:text-amber-900 font-medium underline">
                Lihat selengkapnya
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/terastanjung.png') }}" alt="Pondok Rowo Indah" class="w-full h-full object-cover">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Pondok Rowo Indah</h3>
                    <p class="text-amber-700 font-medium text-lg">Rp 150.000 per malam</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/kertanegara.png') }}" alt="Omah Tawon" class="w-full h-full object-cover">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Omah Tawon</h3>
                    <p class="text-amber-700 font-medium text-lg">Rp 135.000 per malam</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/omahkali.png') }}" alt="Omah Kali Putih" class="w-full h-full object-cover">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Omah Kali Putih</h3>
                    <p class="text-amber-700 font-medium text-lg">Rp 200.000 per malam</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/omahdewe.png') }}" alt="Teras Tanjung Papuma" class="w-full h-full object-cover">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Teras Tanjung Papuma</h3>
                    <p class="text-amber-700 font-medium text-lg">Rp 250.000 per malam</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 mt-8 max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/landingpage.png') }}" alt="Kertanegara" class="w-full h-full object-cover">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Kertanegara</h3>
                    <p class="text-amber-700 font-medium text-lg">Rp 450.000 per malam</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/rembangan.png') }}" alt="Rembangan Hill" class="w-full h-full object-cover">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Rembangan Hill</h3>
                    <p class="text-amber-700 font-medium text-lg">Rp 300.000 per malam</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-amber-800 mb-8">About Us</h2>

        <div class="mb-12">
            <img src="{{ asset('images/favicon.png') }}" alt="Nginepo Logo" class="h-24 mx-auto mb-4">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-amber-50 p-8 rounded-2xl">
                <div class="text-5xl mb-6">🏛️</div>
                <h3 class="text-xl font-semibold text-amber-800 mb-4">
                    Sebuah platform untuk penyewaan rumah warga di wilayah wisata Jember
                </h3>
            </div>

            <div class="bg-amber-50 p-8 rounded-2xl">
                <div class="text-5xl mb-6">📍</div>
                <h3 class="text-xl font-semibold text-amber-800 mb-4">
                    Katalog yang informatif mulai dari lokasi, harga, fasilitas serta dilengkapi dengan foto
                </h3>
            </div>

            <div class="bg-amber-50 p-8 rounded-2xl">
                <div class="text-5xl mb-6">💳</div>
                <h3 class="text-xl font-semibold text-amber-800 mb-4">
                    Proses transaksi yang aman dan terdokumentasi
                </h3>
            </div>
        </div>
    </div>
</section>

<!-- Smooth Scroll Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);

    // Observe all accommodation cards
    document.querySelectorAll('.bg-white.rounded-2xl').forEach(card => {
        observer.observe(card);
    });
});
</script>

<style>
.animate-fade-in {
    animation: fadeInUp 0.6s ease-out forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection
