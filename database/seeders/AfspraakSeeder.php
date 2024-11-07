<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Afspraak;
use App\Models\User;
use Faker\Factory as Faker;

class AfspraakSeeder extends Seeder
{
    public function run()
    {
        // Maak een instantie van de Faker-bibliotheek
        $faker = Faker::create();

        // Haal de eerste twee gebruikers op, of maak ze aan als ze niet bestaan
        $user1 = User::firstOrCreate(
            ['email' => 'test1@example.com'],
            ['name' => 'Test Gebruiker 1', 'password' => bcrypt('password')]
        );

        $user2 = User::firstOrCreate(
            ['email' => 'test2@example.com'],
            ['name' => 'Test Gebruiker 2', 'password' => bcrypt('password')]
        );

        // Maak 5 unieke afspraken voor user1
        for ($i = 0; $i < 5; $i++) {
            Afspraak::create([
                'user_id' => $user1->id,
                'email' => $user1->email,
                'product' => $faker->word, // Uniek product per afspraak
                'help_request' => $faker->sentence, // Unieke hulpverzoek
                'phone' => $faker->phoneNumber, // Uniek telefoonnummer
                'datum' => $faker->dateTimeBetween('now', '+1 week')->format('Y-m-d H:i:s'), // Unieke datum binnen 1 week
                'opmerkingen' => $faker->sentence, // Unieke opmerkingen
            ]);
        }

        // Maak 5 unieke afspraken voor user2
        for ($i = 0; $i < 5; $i++) {
            Afspraak::create([
                'user_id' => $user2->id,
                'email' => $user2->email,
                'product' => $faker->word, // Uniek product per afspraak
                'help_request' => $faker->sentence, // Unieke hulpverzoek
                'phone' => $faker->phoneNumber, // Uniek telefoonnummer
                'datum' => $faker->dateTimeBetween('now', '+1 week')->format('Y-m-d H:i:s'), // Unieke datum binnen 1 week
                'opmerkingen' => $faker->sentence, // Unieke opmerkingen
            ]);
        }
    }
}
