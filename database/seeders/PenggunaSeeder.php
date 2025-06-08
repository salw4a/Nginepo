<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        $pengguna = [
            [
                'nama' => 'Penyewa Sample',
                'email' => 'penyewa@example.com',
                'kata_sandi' => Hash::make('password123'),
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Contoh No. 1',
                'foto_profil' => null,
                'id_role' => 1,
            ],
            [
                'nama' => 'Admin Sample',
                'email' => 'admin@example.com',
                'kata_sandi' => Hash::make('adminpassword'),
                'no_hp' => '082345678901',
                'alamat' => 'Jl. Admin No. 1',
                'foto_profil' => null,
                'id_role' => 2,
            ]
        ];

        foreach ($pengguna as $data) {
            Pengguna::create($data);
        }
    }
}
