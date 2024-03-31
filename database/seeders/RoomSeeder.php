<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generar 10 registros
        for ($i = 0; $i < 10; $i++) {
            Room::create([
                'name' => $faker->word,
                'description' => $faker->sentence
            ]);
        }
    }
}
