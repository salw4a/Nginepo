<aside class="w-64 bg-white shadow-lg min-h-screen fixed left-0 top-0">
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-brown rounded mr-3"></div>
            <span class="text-xl font-bold text-brown">Nginepo</span>
        </div>
    </div>

    <nav class="mt-6">
        <div class="px-4 space-y-2">
            <a href="{{ route('pemilik.dashboard') }}"
               class="flex items-center px-4 py-3 rounded-lg transition-colors
               {{ request()->routeIs('beranda') ? 'text-white bg-brown' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
                Beranda
            </a>

            <a href="{{route('pemilik.properti.index')}}"
               class="flex items-center px-4 py-3 rounded-lg transition-colors
               {{ request()->routeIs('katalog.*') ? 'text-white bg-brown' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                </svg>
                Katalog
            </a>

            <a href="#"
               class="flex items-center px-4 py-3 rounded-lg transition-colors
               {{ request()->routeIs('laporan.*') ? 'text-white bg-brown' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                </svg>
                Laporan
            </a>

            <a href="{{route('pemilik.profile.show')}}"
               class="flex items-center px-4 py-3 rounded-lg transition-colors
               {{ request()->routeIs('profil') ? 'text-white bg-brown' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
                Profil
            </a>
        </div>
    </nav>
    <div class="p-4 border-t border-gray-200">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full flex items-center px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 transition-colors font-semibold">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>
