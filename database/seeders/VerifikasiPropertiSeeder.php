<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VerifikasiProperti;

class VerifikasiPropertiSeeder extends Seeder
{
    public function run(): void
    {
        $verifikasipropertis = [
            [
                'id_verifikasi_properti' => '1',
                'nama_verifikasi_properti' => 'Terverifikasi'
            ],
            [
                'id_verifikasi_properti' => '2',
                'nama_verifikasi_properti' => 'Belum Terverifikasi'
            ],
        ];

        foreach ($verifikasipropertis as $verifikasiproperti) {
            VerifikasiProperti::create($verifikasiproperti);
        }
    }
}
