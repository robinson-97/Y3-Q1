<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Zet testgebruikers aan met de UserSeeder
        $this->call(UserSeeder::class);

        // Zet afspraken aan met de AfspraakSeeder
        $this->call(AfspraakSeeder::class);
    }
}
