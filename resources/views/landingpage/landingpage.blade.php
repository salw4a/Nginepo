@section('title', 'Landingpage')

<nav class="bg-white shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <div class="text-2xl font-bold text-amber-800">Nginepo</div>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-amber-800 font-medium hover:text-amber-600 transition-colors">Beranda</a>
                <a href="#" onclick="requireLogin('katalog')" class="text-gray-700 hover:text-amber-600 transition-colors cursor-pointer">Katalog</a>
                <a href="#" onclick="requireLogin('transaksi')" class="text-gray-700 hover:text-amber-600 transition-colors cursor-pointer">Transaksi</a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-amber-600 transition-colors px-4 py-2 rounded-lg border border-gray-300 hover:border-amber-300">Login</a>
                <a href="{{ route('register') }}" class="bg-amber-800 text-white px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors">Register</a>
            </div>

            <div class="md:hidden">
                <button onclick="toggleMobileMenu()" class="text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
        <div class="px-4 py-3 space-y-3">
            <a href="{{ route('home') }}" class="block text-amber-800 font-medium">Beranda</a>
            <a href="#" onclick="requireLogin('katalog')" class="block text-gray-700">Katalog</a>
            <a href="#" onclick="requireLogin('transaksi')" class="block text-gray-700">Transaksi</a>
            <div class="pt-3 border-t">
                <a href="{{ route('login') }}" class="block text-gray-700 py-2">Login</a>
                <a href="{{ route('register') }}" class="block bg-amber-800 text-white px-4 py-2 rounded-lg text-center">Register</a>
            </div>
        </div>
    </div>
</nav>

<section class="hero-bg h-96 flex items-center justify-center text-white text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang!</h1>
        <p class="text-xl md:text-2xl mb-8 opacity-90">
            Dengan Nginepo, penyewaan tempat penginapan<br>
            dapat dilakukan dimana saja dan kapan saja
        </p>
        <button onclick="requireLogin('booking')" class="bg-amber-800 hover:bg-amber-700 text-white px-8 py-3 rounded-lg text-lg font-medium transition-colors">
            Booking sekarang
        </button>
    </div>
</section>

<section class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Penginapan populer di Jember</h2>
        <a href="#" onclick="requireLogin('katalog')" class="text-amber-800 hover:text-amber-600 font-medium underline">Lihat selengkapnya</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 bg-gradient-to-br from-green-400 to-green-600"></div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-900 mb-2">Pondok Rowo Indah</h3>
                <p class="text-amber-800 font-medium">Rp 150.000 per malam</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 bg-gradient-to-br from-amber-400 to-amber-600"></div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-900 mb-2">Omah Tawon</h3>
                <p class="text-amber-800 font-medium">Rp 135.000 per malam</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600"></div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-900 mb-2">Omah Kali Putih</h3>
                <p class="text-amber-800 font-medium">Rp 200.000 per malam</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="h-48 bg-gradient-to-br from-red-400 to-red-600"></div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-900 mb-2">Teras Tanjung Papuma</h3>
                <p class="text-amber-800 font-medium">Rp 250.000 per malam</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">About Us</h2>
        <div class="flex justify-center mb-8">
            <div class="text-4xl font-bold text-amber-800">Nginepo</div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <div class="bg-amber-200 rounded-lg p-8">
                <div class="text-4xl mb-4">🏛️</div>
                <p class="text-gray-700 leading-relaxed">
                    Sebuah platform untuk penyewaan rumah warga di wilayah wisata Jember
                </p>
            </div>

            <div class="bg-amber-200 rounded-lg p-8">
                <div class="text-4xl mb-4">📍</div>
                <p class="text-gray-700 leading-relaxed">
                    Katalog yang informatif mulai dari lokasi, harga, fasilitas serta dilengkapi dengan foto
                </p>
            </div>

            <div class="bg-amber-200 rounded-lg p-8">
                <div class="text-4xl mb-4">💳</div>
                <p class="text-gray-700 leading-relaxed">
                    Proses transaksi yang aman dan terdokumentasi
                </p>
            </div>
        </div>
    </div>
</section>

<footer class="bg-white border-t py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="font-semibold text-gray-900 mb-4">Navigasi</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-amber-600">Beranda</a></li>
                    <li><a href="#" onclick="requireLogin('katalog')" class="text-gray-600 hover:text-amber-600">Katalog</a></li>
                    <li><a href="#" onclick="requireLogin('transaksi')" class="text-gray-600 hover:text-amber-600">Transaksi</a></li>
                </ul>
            </div>

            <div>
                <p class="text-gray-600 text-center">
                    Sistem penyewaan rumah lokal © 2025 - Platform terpercaya untuk penyewaan lokal wilayah wisata Jember
                </p>
            </div>

            <div>
                <h3 class="font-semibold text-gray-900 mb-4">Contact Us</h3>
                <p class="text-gray-600">+62-834-7619-2563</p>
            </div>
        </div>

        <div class="mt-8 pt-8 border-t text-center">
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.404-5.966 1.404-5.966s-.359-.219-.359-1.219c0-1.142.662-1.995 1.488-1.995.702 0 1.041.219 1.041 1.219 0 .662-.359 1.488-.539 2.262-.219.937.219 1.697 1.219 1.697 1.404 0 2.262-1.697 2.262-3.439 0-1.781-1.219-3.098-3.098-3.098-2.262 0-3.658 1.641-3.658 3.439 0 .662.199 1.404.539 1.781-.061.199-.199.662-.219.842-.041.199-.041.199-.199.199-.662-.041-1.083-.662-1.083-1.404 0-2.403 1.697-4.665 5.038-4.665 2.641 0 4.665 1.904 4.665 4.382 0 2.641-1.563 4.665-3.816 4.665-.762 0-1.483-.419-1.723-.898 0 0-.419 1.563-.498 1.921-.199.762-.662 1.404-1.004 1.904.762.219 1.563.359 2.403.359 6.621 0 11.988-5.367 11.988-11.987C24.005 5.367 18.638.001 12.017.001z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>

<div id="loginModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-md mx-4">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-amber-100 mb-4">
                <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-4">Login Diperlukan</h3>
            <p class="text-gray-600 mb-6">Silakan login terlebih dahulu untuk mengakses halaman ini.</p>
            <div class="flex space-x-4">
                <button onclick="closeModal()" class="flex-1 bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                    Batal
                </button>
                <a href="{{ route('login') }}" class="flex-1 bg-amber-800 text-white px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors text-center">
                    Login
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function requireLogin(page) {
        document.getElementById('loginModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('loginModal').classList.add('hidden');
    }

    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }

    document.getElementById('loginModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
