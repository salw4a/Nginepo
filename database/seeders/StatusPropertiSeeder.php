<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusProperti;

class StatusPropertiSeeder extends Seeder
{
    public function run(): void
    {
        StatusProperti::create(['nama_status_properti' => 'tersedia']);
        StatusProperti::create(['nama_status_properti' => 'tidak_tersedia']);
    }
}
