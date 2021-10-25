<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Constraint\Count;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        switch (env('DB_CONNECTION')) {
            case 'mysql':
                Log::info('MYSQL import');
                DB::unprepared(File::get('database/seeders/countries-dump.sql'));
                DB::unprepared(File::get('database/seeders/cities-dump.sql'));
                break;
            case 'sqlite':
                Log::info('SQLITE import');
                DB::unprepared(File::get('database/seeders/countries-dump.sqlite'));
                DB::unprepared(File::get('database/seeders/cities-dump.sqlite'));
                break;
            default:
                throw new \Exception(
                    sprintf(
                        'Neither mysql or sqlite is being used? Currently using %s',
                        env('DB_CONNECTION')
                    )
                );
        }
        $this->call(PlayersSeeder::class);
        $this->call(FixturesSeeder::class);

    }
}
