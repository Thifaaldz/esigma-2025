<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kendaraans')->insert([
            [
                'user_id' => 1, // ← Tambahkan ini
                'nopol' => 'B1234ABC',
                'no_rangka' => 'RNG1234567890A1',
                'no_mesin' => 'ENG1234567890A1',
                'jenis_roda' => '2',
                'merek' => 'Honda',
                'tipe' => 'Vario 150',
                'tahun_pembuatan' => '2020',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'nopol' => 'D5678XYZ',
                'no_rangka' => 'RNG234567890B2',
                'no_mesin' => 'ENG234567890B2',
                'jenis_roda' => '4',
                'merek' => 'Toyota',
                'tipe' => 'Avanza',
                'tahun_pembuatan' => '2019',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'nopol' => 'F8765LMN',
                'no_rangka' => 'RNG345678901C3',
                'no_mesin' => 'ENG345678901C3',
                'jenis_roda' => '2',
                'merek' => 'Yamaha',
                'tipe' => 'NMAX',
                'tahun_pembuatan' => '2021',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'nopol' => 'E4567JKL',
                'no_rangka' => 'RNG456789012D4',
                'no_mesin' => 'ENG456789012D4',
                'jenis_roda' => '4',
                'merek' => 'Daihatsu',
                'tipe' => 'Xenia',
                'tahun_pembuatan' => '2018',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'nopol' => 'B7890QWE',
                'no_rangka' => 'RNG567890123E5',
                'no_mesin' => 'ENG567890123E5',
                'jenis_roda' => '2',
                'merek' => 'Suzuki',
                'tipe' => 'Satria F150',
                'tahun_pembuatan' => '2022',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    
    }
}
