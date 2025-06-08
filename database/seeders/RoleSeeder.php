<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['nama_role' => 'penyewa'],
            ['nama_role' => 'admin'],
            ['nama_role' => 'pemilik']
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
