<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $guard = 'web'; // sesuaikan dengan guard yang kamu pakai di auth.php

    $roles = [
        'super_admin',
        'admin',
        'petugas',
        'polisi',
        'masyarakat',
        'user',
    ];

    foreach ($roles as $role) {
        Role::firstOrCreate([
            'name' => $role,
            'guard_name' => $guard,
        ]);
    }
    }
}