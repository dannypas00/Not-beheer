<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Province;
use Illuminate\Database\Seeder;

class PlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Player::query()->firstOrCreate([
//            'id' => '1',
//        ], [
//            'name' => 'Damiaen',
//        ]);
//
//        Player::query()->firstOrCreate([
//            'id' => '2',
//        ], [
//            'name' => 'Danny',
//        ]);
//
//        Player::query()->firstOrCreate([
//            'id' => '3',
//        ], [
//            'name' => 'Mathijs',
//        ]);
//
//        Player::query()->firstOrCreate([
//            'id' => '4',
//        ], [
//            'name' => 'Nam',
//        ]);
        Player::factory()->count(20)->create();
    }
}
