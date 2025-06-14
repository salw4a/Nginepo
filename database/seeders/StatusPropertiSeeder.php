<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusProperti;

class StatusPropertiSeeder extends Seeder
{
    public function run(): void
    {
        $statusPropertis = [
            [
                'id_status_properti' => '1',
                'nama_status_properti' => 'tersedia'
            ],
            [
                'id_status_properti' => '2',
                'nama_status_properti' => 'tidak_tersedia'
            ],
        ];

        foreach ($statusPropertis as $statusProperti) {
            StatusProperti::create($statusProperti);
        }
    }
}
