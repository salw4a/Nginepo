@extends('pemilik.layouts.main')

@section('title', 'Dashboard - Nginepo')

@section('sidebar')
<ul class="space-y-2 px-6">
    <li>
        <a href="{{ route('dashboard-pemilik') }}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg bg-gray-100">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="{{ route('pemilik.properti.index') }}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg hover:bg-gray-100">
            <i class="fas fa-th-large"></i>
            <span>Katalog</span>
        </a>
    </li>
    <li>
        <a href="#" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg hover:bg-gray-100">
            <i class="fas fa-calendar"></i>
            <span>Kalender</span>
        </a>
    </li>
    <li>
        <a href="#" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg hover:bg-gray-100">
            <i class="fas fa-chart-line"></i>
            <span>Laporan</span>
        </a>
    </li>
    <li>
        <a href="#" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg hover:bg-gray-100">
            <i class="fas fa-user"></i>
            <span>Profil</span>
        </a>
    </li>
</ul>
@endsection

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-amber-800 mb-2">Selamat Datang!</h1>
    <p class="text-gray-600">Kelola properti anda menggunakan Nginepo</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-amber-800 text-white p-6 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Jumlah Properti</h3>
        <p class="text-3xl font-bold">{{ $totalProperti }}</p>
    </div>
    <div class="bg-amber-800 text-white p-6 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Properti Terbooking</h3>
        <p class="text-3xl font-bold">({{ $tanggal }}: {{ $propertiTerbooking}})</p>
    </div>
    <div class="bg-amber-800 text-white p-6 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Pendapatan Bulan Ini</h3>
        <p class="text-3xl font-bold">Rp{{ number_format($data['monthly_income']) }}</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Properti Anda</h2>
        <a href="{{ route('user.catalog') }}" class="text-amber-800 hover:text-amber-900 font-medium">Lihat selengkapnya</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($data['properties'] as $property)
        <div class="bg-white border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
            <img src="{{ $property['image'] }}" alt="{{ $property['name'] }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-gray-800 mb-2">{{ $property['name'] }}</h3>
                <p class="text-amber-800 font-bold">Rp {{ number_format($property['price']) }} per malam</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
