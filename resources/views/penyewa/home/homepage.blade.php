@extends('penyewa.layouts.main')
@section('title', 'Beranda')

@section('contents')
    <!-- Hero Section -->
    <section class="hero relative text-white text-center py-32 bg-gradient-to-b from-black/50 to-black/30"
             style="background-image: url('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-4">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Selamat Datang!</h1>
            <p class="text-xl md:text-2xl mb-10 leading-relaxed max-w-3xl mx-auto">
                Dengan Nginepo, penyewaan tempat penginapan<br>
                dapat dilakukan dimana saja dan kapan saja
            </p>
            <a href="#" class="inline-block bg-[#8B4513] hover:bg-[#A0522D] text-white px-10 py-4 rounded-full text-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                Booking sekarang
            </a>
        </div>
    </section>

    <section class="py-16 px-6 bg-gradient-to-b from-orange-50 to-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-[#8B4513]">Penginapan populer di Jember</h2>
                <a href="#" class="text-[#8B4513] hover:text-[#A0522D] font-semibold text-lg transition-colors duration-300">
                    Lihat selengkapnya →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             alt="Pondok Rowo Indah"
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute top-4 right-4 bg-white/90 px-3 py-1 rounded-full text-sm font-semibold text-[#8B4513]">
                            Popular
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">Pondok Rowo Indah</h3>
                        <p class="text-[#8B4513] font-bold text-xl">Rp 150.000 <span class="text-sm font-normal text-gray-600">per malam</span></p>
                        <div class="mt-3 flex items-center text-yellow-500">
                            <span class="text-sm">★★★★★</span>
                            <span class="ml-2 text-gray-600 text-sm">(4.8)</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             alt="Omah Tawon"
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">Omah Tawon</h3>
                        <p class="text-[#8B4513] font-bold text-xl">Rp 135.000 <span class="text-sm font-normal text-gray-600">per malam</span></p>
                        <div class="mt-3 flex items-center text-yellow-500">
                            <span class="text-sm">★★★★☆</span>
                            <span class="ml-2 text-gray-600 text-sm">(4.5)</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             alt="Omah Kali Putih"
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">Omah Kali Putih</h3>
                        <p class="text-[#8B4513] font-bold text-xl">Rp 200.000 <span class="text-sm font-normal text-gray-600">per malam</span></p>
                        <div class="mt-3 flex items-center text-yellow-500">
                            <span class="text-sm">★★★★★</span>
                            <span class="ml-2 text-gray-600 text-sm">(4.9)</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             alt="Teras Tanjung Papuma"
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Hot Deal
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">Teras Tanjung Papuma</h3>
                        <p class="text-[#8B4513] font-bold text-xl">Rp 250.000 <span class="text-sm font-normal text-gray-600">per malam</span></p>
                        <div class="mt-3 flex items-center text-yellow-500">
                            <span class="text-sm">★★★★★</span>
                            <span class="ml-2 text-gray-600 text-sm">(5.0)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-gradient-to-b from-[#8B4513] to-[#A0522D] text-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-16">About Us</h2>
            <div class="mb-16">
                <div class="inline-flex items-center text-6xl font-bold mb-4">
                    <div class="mr-4 text-8xl">🏠</div>
                    <span class="text-white tracking-wider">Nginepo</span>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 hover:bg-white/20 transition-all duration-300">
                    <div class="text-5xl mb-6">🏛️</div>
                    <h3 class="text-xl font-bold mb-4">Sebuah platform</h3>
                    <p class="text-white/90 leading-relaxed">
                        untuk penyewaan rumah warga di wilayah wisata Jember
                    </p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 hover:bg-white/20 transition-all duration-300">
                    <div class="text-5xl mb-6">📍</div>
                    <h3 class="text-xl font-bold mb-4">Katalog yang informatif</h3>
                    <p class="text-white/90 leading-relaxed">
                        mulai dari lokasi, harga, fasilitas serta dilengkapi dengan foto
                    </p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 hover:bg-white/20 transition-all duration-300">
                    <div class="text-5xl mb-6">💳</div>
                    <h3 class="text-xl font-bold mb-4">Proses transaksi</h3>
                    <p class="text-white/90 leading-relaxed">
                        yang aman dan terdokumentasi
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
