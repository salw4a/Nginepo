<nav class="bg-white shadow-sm py-4 px-6">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center">
            <h1 class="text-2xl font-bold text-brown-900">Nginepô</h1>
        </div>

        <div class="hidden md:flex items-center space-x-8">
            <a href="{{ route('homepage-pengguna') }}" class="text-brown-900 hover:text-brown-700 font-medium">Beranda</a>
            <a href="{{route('penyewa.properti.index')}}" class="text-brown-900 hover:text-brown-700 font-medium">Katalog</a>
            <a href="{{route('penyewa.transaksi.index')}}" class="text-brown-900 hover:text-brown-700 font-medium">Transaksi</a>
            <a href="#" class="text-brown-900 hover:text-brown-700 font-medium">Kalender</a>
        </div>

        <div class="flex items-center">
            <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center">
                <span class="text-xl">😊</span>
            </div>
        </div>

        <div class="md:hidden">
            <button class="text-brown-900 hover:text-brown-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>
