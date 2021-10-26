<?php

namespace Database\Seeders;

use App\Models\Fixture;
use App\Models\Game;
use App\Models\Leg;
use App\Models\Player;
use App\Models\Set;
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
        $fixtures = Fixture::factory()->count(20)->afterCreating(function (Fixture $fixture) {
            $players = Player::all()->random(2)->pluck('id');
            $fixture->player_1 = $players[0];
            $fixture->player_2 = $players[1];
            Game::factory()->count($fixture->length)->afterCreating(function (Game $game) {
                app($game->gameable_type === Set::class ? SetFactory::class : LegFactory::class)
                    ->count(5)->create();
            })->create([
                'gameable_type' => $fixture->style === 'legs' ? Leg::class : Set::class,
                'fixture_id'    => $fixture->id
            ]);
            $fixture->save();
        })->create();
    }
}
