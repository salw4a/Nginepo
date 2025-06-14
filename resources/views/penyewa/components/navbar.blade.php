@php
    $currentUser = Auth::guard('pengguna')->user() ?? Auth::guard('pemilik')->user();
@endphp

<nav class="bg-white shadow-sm py-4 px-6">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center">
            <h1 class="text-2xl font-bold text-brown-900">Nginepô</h1>
        </div>

        <div class="hidden md:flex items-center space-x-8">
            <a href="{{ route('homepage-pengguna') }}" class="text-brown-900 hover:text-brown-700 font-medium">Beranda</a>
            <a href="{{ route('penyewa.properti.index') }}" class="text-brown-900 hover:text-brown-700 font-medium">Katalog</a>
            <a href="{{ route('penyewa.transaksi.index') }}" class="text-brown-900 hover:text-brown-700 font-medium">Transaksi</a>
        </div>

        @if ($currentUser)
            <div x-data="{ open: false }" @click.away="open = false" class="relative">

                <button @click="open = !open" class="w-10 h-10 rounded-full overflow-hidden border-2 border-gray-200 hover:border-brown-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-700">
                    @if($currentUser->foto_profil)
                        <img src="{{ asset('storage/' . $currentUser->foto_profil) }}" alt="Profil" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-brand-brown-dark flex items-center justify-center text-white font-bold text-lg">
                            {{ strtoupper(substr($currentUser->nama, 0, 1)) }}
                        </div>
                    @endif
                </button>

                <div x-show="open"
                     x-transition
                     class="absolute right-0 mt-2 w-56 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">

                    <div class="py-1">
                        <div class="px-4 py-3 border-b border-gray-200">
                            <p class="text-sm font-semibold text-gray-900 truncate">{{ $currentUser->nama }}</p>
                            <p class="text-sm text-gray-500 truncate">{{ $currentUser->email }}</p>
                        </div>

                        <div class="py-1">
                            @if(Auth::guard('pengguna')->check())
                                @if(Auth::guard('pengguna')->user()->role->nama_role === 'admin')
                                    <a href="{{ route('admin.profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
                                @else
                                    <a href="{{ route('penyewa.profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
                                @endif
                            @elseif(Auth::guard('pemilik')->check())
                                <a href="{{ route('pemilik.profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil Saya</a>
                            @endif
                        </div>

                        <div class="py-1 border-t border-gray-200">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="md:hidden">
            <button class="text-brown-900 hover:text-brown-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>
