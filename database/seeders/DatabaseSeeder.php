<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Constraint\Count;

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
//        $this->call(GamesSeeder::class);
//        $this->call(SetsSeeder::class);
//        $this->call(LegsSeeder::class);
        DB::unprepared(File::get('database/seeders/countries-dump.sql'));
        DB::unprepared(File::get('database/seeders/cities-dump.sql'));
    }
}
