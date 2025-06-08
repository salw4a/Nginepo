<?php

namespace Database\Seeders;

use App\Models\StatusProperti;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            StatusPropertiSeeder::class,
            RoleSeeder::class,
            StatusPembayaranSeeder::class,
            PemilikSeeder::class,
            PropertiSeeder::class,
            PenggunaSeeder::class,
            TransaksiSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
