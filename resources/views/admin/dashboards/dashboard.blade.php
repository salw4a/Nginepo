@extends('admin.layouts.main')

@section('title', 'Admin Dashboard - Nginepo')

@section('sidebar')
<ul class="space-y-2 px-6">
    <li>
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg bg-gray-100">
            <i class="fas fa-home"></i>
            <span>Beranda</span>
        </a>
    </li>
    <li>
        <a href="#" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg hover:bg-gray-100">
            <i class="fas fa-th-large"></i>
            <span>Katalog</span>
        </a>
    </li>
    <li>
        <a href="#" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg hover:bg-gray-100">
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

<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Grafik Pendapatan</h2>
        <div class="flex gap-4">
            <select id="filterType" class="rounded-lg border-gray-300 focus:border-amber-500 focus:ring-amber-500">
                <option value="day">Hari Ini</option>
                <option value="month" selected>Bulan Ini</option>
                <option value="year">Tahun Ini</option>
            </select>
            <input type="date" id="dateFilter" class="rounded-lg border-gray-300 focus:border-amber-500 focus:ring-amber-500 hidden">
            <select id="monthFilter" class="rounded-lg border-gray-300 focus:border-amber-500 focus:ring-amber-500">
                @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ $i == date('n') ? 'selected' : '' }}>
                        {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                    </option>
                @endfor
            </select>
            <select id="yearFilter" class="rounded-lg border-gray-300 focus:border-amber-500 focus:ring-amber-500">
                @for($i = date('Y'); $i >= date('Y')-5; $i--)
                    <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>
    <div class="h-96">
        <canvas id="revenueChart"></canvas>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
let revenueChart;

function updateChart() {
    const filterType = document.getElementById('filterType').value;
    const date = document.getElementById('dateFilter').value;
    const month = document.getElementById('monthFilter').value;
    const year = document.getElementById('yearFilter').value;

    fetch(`{{ route('admin.revenue.data') }}?filter=${filterType}&date=${date}&month=${month}&year=${year}`)
        .then(response => response.json())
        .then(data => {
            if (revenueChart) {
                revenueChart.destroy();
            }

            const ctx = document.getElementById('revenueChart').getContext('2d');
            revenueChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Pendapatan',
                        data: data.data,
                        backgroundColor: '#92400E',
                        borderColor: '#92400E',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Rp' + context.raw.toLocaleString('id-ID');
                                }
                            }
                        }
                    }
                }
            });
        });
}

document.addEventListener('DOMContentLoaded', function() {
    updateChart();

    document.getElementById('filterType').addEventListener('change', function(e) {
        const filterType = e.target.value;
        document.getElementById('dateFilter').classList.toggle('hidden', filterType !== 'day');
        document.getElementById('monthFilter').classList.toggle('hidden', filterType === 'year');
        updateChart();
    });

    document.getElementById('dateFilter').addEventListener('change', updateChart);
    document.getElementById('monthFilter').addEventListener('change', updateChart);
    document.getElementById('yearFilter').addEventListener('change', updateChart);
});
</script>
@endpush
@endsection
