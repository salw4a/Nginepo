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

            <a href="#"
               class="flex items-center px-4 py-3 rounded-lg transition-colors
               {{ request()->routeIs('katalog.*') ? 'text-white bg-brown' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                </svg>
                Katalog
            </a>

            <a href="#"
               class="flex items-center px-4 py-3 rounded-lg transition-colors
               {{ request()->routeIs('kalender') ? 'text-white bg-brown' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                </svg>
                Kalender
            </a>

            <a href="#"
               class="flex items-center px-4 py-3 rounded-lg transition-colors
               {{ request()->routeIs('laporan.*') ? 'text-white bg-brown' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                </svg>
                Laporan
            </a>

            <a href="{#}"
               class="flex items-center px-4 py-3 rounded-lg transition-colors
               {{ request()->routeIs('profil') ? 'text-white bg-brown' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
                Profil
            </a>
        </div>
    </nav>
</aside>
