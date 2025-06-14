<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pemilik;
use Illuminate\Support\Facades\Hash;

class PemilikSeeder extends Seeder
{
    public function run(): void
    {
        $pemilik = [
            [
                'id_pemilik' => 1,
                'nama' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'kata_sandi' => Hash::make('password123'),
                'telepon' => '081234567890',
                'alamat' => 'Jl. Mawar No. 10, Jember',
                'foto_profil' => 'budi.jpg',
                'jumlah_properti' => 4,
                'id_role' => 3,
            ],
            [
                'id_pemilik' => 2,
                'nama' => 'Sari Wijaya',
                'email' => 'sari@example.com',
                'kata_sandi' => Hash::make('rahasiakita'),
                'telepon' => '082345678901',
                'alamat' => 'Jl. Melati No. 5, Jember',
                'foto_profil' => 'sari.png',
                'jumlah_properti' => 4,
                'id_role' => 3,
            ]
        ];

        foreach ($pemilik as $data) {
            Pemilik::create($data);
        }
    }
}
