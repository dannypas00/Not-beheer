<?php

namespace Database\Seeders;

use App\Models\PlayerFixture;
use Illuminate\Database\Seeder;

class PlayerFixturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlayerFixture::query()->firstOrCreate([
            'id' => '1',
        ], [
            'player_id' => '1',
            'fixture_id' => '1',
            'order' => '1',
        ]);

        PlayerFixture::query()->firstOrCreate([
            'id' => '2',
        ], [
            'player_id' => '2',
            'fixture_id' => '1',
            'order' => '2',
        ]);

        PlayerFixture::query()->firstOrCreate([
            'id' => '3',
        ], [
            'player_id' => '3',
            'fixture_id' => '2',
            'order' => '1',
        ]);

        PlayerFixture::query()->firstOrCreate([
            'id' => '4',
        ], [
            'player_id' => '4',
            'fixture_id' => '2',
            'order' => '2',
        ]);
    }
}
