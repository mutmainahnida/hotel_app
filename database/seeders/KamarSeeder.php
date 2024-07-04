<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kamars')->insert([
            [
                'nama' => 'Deluxe Room',
                'deskripsi' => 'Kamar mewah dengan pemandangan laut',
                'harga_permalam' => 1500000,
                'ketersediaan' => true,
            ],
            [
                'nama' => 'Standard Room',
                'deskripsi' => 'Kamar standar dengan fasilitas lengkap',
                'harga_permalam' => 800000,
                'ketersediaan' => true,
            ],
            [
                'nama' => 'Suite Room',
                'deskripsi' => 'Kamar suite dengan ruang tamu dan balkon',
                'harga_permalam' => 3000000,
                'ketersediaan' => true,
            ],
        ]);
    }
}
