<?php

namespace Database\Seeders;

use App\Models\Leg;
use Illuminate\Database\Seeder;

class LegsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate some legs for leg-based game
        Leg::query()->firstOrCreate([
            'id' => '1',
        ], [
            'set_id' => null,
            'average_score' => 0,
            'winner' => null,
            'throws' => null,
        ]);

        Leg::query()->firstOrCreate([
            'id' => '2',
        ], [
            'set_id' => null,
            'average_score' => 0,
            'winner' => null,
            'throws' => null,
        ]);

        Leg::query()->firstOrCreate([
            'id' => '3',
        ], [
            'set_id' => null,
            'average_score' => 0,
            'winner' => null,
            'throws' => null,
        ]);

        // Generate some legs for set-based games
        Leg::query()->firstOrCreate([
            'id' => '4',
        ], [
            'set_id' => 1,
            'average_score' => 0,
            'winner' => null,
            'throws' => null,
        ]);

        Leg::query()->firstOrCreate([
            'id' => '5',
        ], [
            'set_id' => 1,
            'average_score' => 0,
            'winner' => null,
            'throws' => null,
        ]);

        Leg::query()->firstOrCreate([
            'id' => '6',
        ], [
            'set_id' => 1,
            'average_score' => 0,
            'winner' => null,
            'throws' => null,
        ]);

        Leg::query()->firstOrCreate([
            'id' => '7',
        ], [
            'set_id' => 1,
            'average_score' => 0,
            'winner' => null,
            'throws' => null,
        ]);

        Leg::query()->firstOrCreate([
            'id' => '8',
        ], [
            'set_id' => 1,
            'average_score' => 0,
            'winner' => null,
            'throws' => null,
        ]);

        Leg::query()->firstOrCreate([
            'id' => '9',
        ], [
            'set_id' => 1,
            'average_score' => 0,
            'winner' => null,
            'throws' => null,
        ]);
    }
}
