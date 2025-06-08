<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $transaksi = [
            [
                'id_status_pembayaran' => 1,
                'tanggal_pembayaran' => Carbon::now(),
                'nomor_invoice' => 'NGPO-001',
                'nama_properti' => 'Villa Sunset',
                'tanggal_mulai' => Carbon::now()->addDays(1)->format('Y-m-d'),
                'tanggal_selesai' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'total_harga' => 2500000,
                'id_pengguna' => 1,
            ],
            [
                'id_status_pembayaran' => 1,
                'tanggal_pembayaran' => Carbon::now(),
                'nomor_invoice' => 'NGPO-002',
                'nama_properti' => 'Pondok Rowo Indah',
                'tanggal_mulai' => Carbon::now()->addDays(1)->format('Y-m-d'),
                'tanggal_selesai' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'total_harga' => 1500000,
                'id_pengguna' => 1,
            ]
        ];

        foreach ($transaksi as $data) {
            Transaksi::create($data);
        }
    }
}
