<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker; // Import Faker

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); // Initialize Faker

        // Create 50 users
        for ($i = 0; $i < 50; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'), // Default password
                'street_name' => $faker->streetName,
                'postal_code' => $faker->postcode,
                'house_number' => $faker->buildingNumber,
            ]);
        }
    }
}
