<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\penilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Testing\Fakes\Fake;
use Faker\Factory as Faker;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil beberapa hotel secara acak
        $hotels = Hotel::inRandomOrder()->limit(5)->get();

        foreach ($hotels as $hotel) {
            penilaian::create([
                'hotel_id' => $hotel->id,
                'penilaian' => $faker->numberBetween(1, 5),
                'teks_penilaian' => $faker->text,
            ]);
        }
    }
}
