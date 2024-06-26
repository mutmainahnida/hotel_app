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
            'name' => 'Hotel Example 1',
            'location' => 'Location 1',
            'rating' => 5,
            'price_per_night' => 100.00,
            'image' => 'https://example.com/image1.jpg',
            'address' => 'Address 1',
            'room_types' => json_encode(['Single', 'Double', 'Suite']),
        ]);

        Hotel::create([
            'name' => 'Hotel Example 2',
            'location' => 'Location 2',
            'rating' => 4,
            'price_per_night' => 80.00,
            'image' => 'https://example.com/image2.jpg',
            'address' => 'Address 2',
            'room_types' => json_encode(['Single', 'Double']),
        ]);

    
    }
}
