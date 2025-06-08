@extends('admin.layouts.main')

@section('title', 'Admin Dashboard - Nginepo')

@section('sidebar')
<ul class="space-y-2 px-6">
    <li>
        <a href="{{ url('/admin/dashboards/dashboard') }}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg bg-gray-100">
            <i class="fas fa-home"></i>
            <span>Beranda</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/admin/properties/properti') }}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg hover:bg-gray-100">
            <i class="fas fa-th-large"></i>
            <span>Katalog</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/admin/calendars/calendar') }}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg hover:bg-gray-100">
            <i class="fas fa-calendar"></i>
            <span>Kalender</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/admin/managements/management') }}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg hover:bg-gray-100">
            <i class="fas fa-cogs"></i>
            <span>Manajemen</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/admin/reports/laporan')}}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg hover:bg-gray-100">
            <i class="fas fa-chart-line"></i>
            <span>Laporan</span>
        </a>
    </li>
    <li>
        <a href="{{ url('/admin/profiles/profile') }}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg hover:bg-gray-100">
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

<!-- Admin Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-amber-800 text-white p-6 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Total Pengguna</h3>
        <p class="text-3xl font-bold">{{ $data['total_users'] }}</p>
    </div>
    <div class="bg-amber-800 text-white p-6 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Total Properti</h3>
        <p class="text-3xl font-bold">{{ $data['total_properties'] }}</p>
    </div>
    <div class="bg-amber-800 text-white p-6 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Pendapatan Bulan Ini</h3>
        <p class="text-3xl font-bold">Rp{{ number_format($data['monthly_income']) }}</p>
    </div>
</div>

<!-- Management Section -->
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-6">Panel Manajemen</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
            <h3 class="font-semibold text-gray-800 mb-2">Manajemen User</h3>
            <p class="text-gray-600 mb-4">Kelola pengguna dan pemilik properti</p>
            <button class="bg-amber-800 text-white px-4 py-2 rounded hover:bg-amber-900">Kelola User</button>
        </div>

        <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
            <h3 class="font-semibold text-gray-800 mb-2">Manajemen Properti</h3>
            <p class="text-gray-600 mb-4">Kelola dan verifikasi properti</p>
            <button class="bg-amber-800 text-white px-4 py-2 rounded hover:bg-amber-900">Kelola Properti</button>
        </div>
    </div>
</div>
@endsection
