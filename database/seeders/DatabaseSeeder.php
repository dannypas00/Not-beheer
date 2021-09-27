<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlayersSeeder::class);
        $this->call(FixturesSeeder::class);
        $this->call(PlayerFixturesSeeder::class);
        $this->call(GamesSeeder::class);
        $this->call(SetsSeeder::class);
        $this->call(LegsSeeder::class);
    }
}
