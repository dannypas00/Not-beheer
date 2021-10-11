<?php

namespace Database\Seeders;

use App\Models\Fixture;
use App\Models\Player;
use Carbon\Carbon;
use Database\Factories\PlayerFactory;
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
            'player_1' => Player::factory()->create()->id,
            'player_2' => Player::factory()->create()->id,
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
            'player_1' => Player::factory()->create()->id,
            'player_2' => Player::factory()->create()->id,
            'start_score' => 501,
            'date' => Carbon::today(),
            'winner' => null,
        ]);
    }
}
