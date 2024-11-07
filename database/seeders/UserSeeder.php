<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Maak 50 willekeurige gebruikers aan
        User::factory(50)->create();

        // Controleer of een testgebruiker met dit e-mailadres al bestaat
        $testUser = User::where('email', 'test@example.com')->first();

        // Alleen een test gebruiker aanmaken als deze nog niet bestaat
        if (!$testUser) {
            User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'), // Gebruik een standaard wachtwoord
            ]);
        }
    }
}
