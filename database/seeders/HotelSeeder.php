<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::create([
            'nama' => 'Hotel Example 1',
            'lokasi' => 'Location 1',
            'penilaian' => 5,
            'image' => 'https://example.com/image1.jpg',
            'alamat' => 'Address 1',
            'email' => 'example1@hotel.com', 
        ]);

        Hotel::create([
            'nama' => 'Hotel Example 2',
            'lokasi' => 'Location 2',
            'penilaian' => 4,
            'image' => 'https://example.com/image2.jpg',
            'alamat' => 'Address 2',
            'email' => 'example2@hotel.com',
        ]);

       
    }
}
