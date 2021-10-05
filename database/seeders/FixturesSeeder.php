<?php

namespace Database\Seeders;

use App\Models\Fixture;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FixturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fixture::query()->firstOrCreate([
            'id' => '1',
        ], [
            'type' => 'best_of',
            'style' => 'sets',
            'length' => 3,
            'start_score' => 501,
            'date' => Carbon::today(),
            'winner' => null,
        ]);

        Fixture::query()->firstOrCreate([
            'id' => '2',
        ], [
            'type' => 'first_to',
            'style' => 'legs',
            'length' => 3,
            'start_score' => 501,
            'date' => Carbon::today(),
            'winner' => null,
        ]);
    }
}
