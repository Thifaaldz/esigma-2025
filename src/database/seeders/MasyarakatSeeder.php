<?php

namespace Database\Seeders;

use App\Models\Masyarakat;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


         // Buat user baru
         $user = User::create([
             'name' => 'Contoh Masyarakat',
             'email' => 'masyarakat@example.com',
             'password' => Hash::make('password123'),
         ]);
 
         // Assign role masyarakat
         $user->assignRole('masyarakat');
 
         // Simpan ke tabel masyarakat
         Masyarakat::create([
             'user_id' => $user->id,
             'nik' => '1234567890123456',
             'nama' => 'thifaal',
             'email' => 'thifaal@example.com',
             'telepon' => '081234567890',
         ]);
    }
}
