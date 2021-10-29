<?php

namespace Database\Seeders;

use App\Models\Fixture;
use App\Models\Game;
use App\Models\Leg;
use App\Models\Player;
use App\Models\Set;
use App\Models\Turn;
use Carbon\Carbon;
use Database\Factories\LegFactory;
use Database\Factories\PlayerFactory;
use Database\Factories\SetFactory;
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
        $fixtures = Fixture::factory()->count(20)->afterMaking(function (Fixture $fixture) {
            $players = Player::all()->random(2)->pluck('id');
            $fixture->player_1 = $players[0];
            $fixture->player_2 = $players[1];
        })->afterCreating(function (Fixture $fixture) {
            Game::factory()->count($fixture->length)->afterCreating(function (Game $game) use ($fixture) {
                if ($game->gameable_type === Set::class) {
                    Set::factory()->afterCreating(static function (Set $set) use ($game, &$gameable_id, $fixture) {
                        Leg::factory()->afterCreating(function (Leg $leg) use ($fixture, $set) {
                            Turn::factory()->count(random_int(1, 30))->create([
                                'player' => $fixture->player_1,
                                'leg' => $leg->id,
                                'set_id' => $set->id
                            ]);
                            Turn::factory()->count(random_int(1, 30))->create([
                                'player' => $fixture->player_2,
                                'leg' => $leg->id,
                                'set_id' => $set->id
                            ]);
                        })->create();
                        $gameable_id = $set->id;
                    });
                } else {
                    Leg::factory()->afterCreating(function (Leg $leg) use (&$gameable_id, $fixture) {
                        $gameable_id = $leg->id;
                        Turn::factory()->count(random_int(1, 30))->create([
                            'player' => $fixture->player_1,
                            'leg' => $leg->id
                        ]);
                        Turn::factory()->count(random_int(1, 30))->create([
                            'player' => $fixture->player_2,
                            'leg' => $leg->id
                        ]);
                    })->create();
                }
                $game->gameable_id = $gameable_id;
            })->create([
                'gameable_type' => $fixture->style === 'legs' ? Leg::class : Set::class,
                'fixture_id' => $fixture->id
            ]);
        })->create();
    }
}
