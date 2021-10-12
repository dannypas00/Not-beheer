<?php

namespace Database\Seeders;

use App\Models\Fixture;
use App\Models\Game;
use App\Models\Leg;
use App\Models\Player;
use App\Models\Set;
use Carbon\Carbon;
use Database\Factories\PlayerFactory;
use Faker\Factory;
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
//        Fixture::query()->firstOrCreate([
//            'id' => '1',
//        ], [
//            'type' => 'best_of',
//            'style' => 'sets',
//            'length' => 3,
//            'player_1' => Player::factory()->create()->id,
//            'player_2' => Player::factory()->create()->id,
//            'start_score' => 501,
//            'date' => Carbon::today(),
//            'winner' => null,
//        ]);

//        Fixture::query()->firstOrCreate([
//            'id' => '2',
//        ], [
//            'type' => 'first_to',
//            'style' => 'legs',
//            'length' => 3,
//            'player_1' => Player::factory()->create()->id,
//            'player_2' => Player::factory()->create()->id,
//            'start_score' => 501,
//            'date' => Carbon::today(),
//            'winner' => null,
//        ]);
        $fixtures = Fixture::factory()->count(5)->afterCreating(function (Fixture $fixture) {
            $players = Player::all()->random(2)->pluck('id');
            $fixture->player_1 = $players[0];
            $fixture->player_2 = $players[1];
            Game::factory()->count($fixture->length)->create([
                'gameable_type' => $fixture->style == 'legs' ? Leg::class : Set::class,
                'fixture_id'    => $fixture->id
            ]);
            $fixture->save();
        })->create();
    }
}
