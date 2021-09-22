<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Leg;
use App\Models\Set;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate some sets
        Game::query()->firstOrCreate([
            'id' => '1',
        ], [
            'fixture_id' => '1',
            'gameable_type' => Set::class,
            'gameable_id' => '1',
        ]);

        Game::query()->firstOrCreate([
            'id' => '2',
        ], [
            'fixture_id' => '1',
            'gameable_type' => Set::class,
            'gameable_id' => '2',
        ]);

        Game::query()->firstOrCreate([
            'id' => '3',
        ], [
            'fixture_id' => '1',
            'gameable_type' => Set::class,
            'gameable_id' => '3',
        ]);

        // Generate some legs
        Game::query()->firstOrCreate([
            'id' => '4',
        ], [
            'fixture_id' => '2',
            'gameable_type' => Leg::class,
            'gameable_id' => '1',
        ]);

        Game::query()->firstOrCreate([
            'id' => '5',
        ], [
            'fixture_id' => '2',
            'gameable_type' => Leg::class,
            'gameable_id' => '2',
        ]);

        Game::query()->firstOrCreate([
            'id' => '6',
        ], [
            'fixture_id' => '2',
            'gameable_type' => Leg::class,
            'gameable_id' => '3',
        ]);

    }
}
