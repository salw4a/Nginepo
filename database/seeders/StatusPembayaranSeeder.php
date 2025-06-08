<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusPembayaran;

class StatusPembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $statusPembayaran = [
            ['nama_status_pembayaran' => 'bayar', 'warna_badge' => 'green'],
            ['nama_status_pembayaran' => 'batal', 'warna_badge' => 'red'],
        ];

        foreach ($statusPembayaran as $status) {
            StatusPembayaran::create($status);
        }
    }
}
