<?php

namespace Database\Seeders;

use App\Models\Set;
use Illuminate\Database\Seeder;

class SetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate some sets
        Set::query()->firstOrCreate([
            'id' => '1',
        ], [
            'winner' => null,
        ]);

        Set::query()->firstOrCreate([
            'id' => '2',
        ], [
            'winner' => null,
        ]);

        Set::query()->firstOrCreate([
            'id' => '3',
        ], [
            'winner' => null,
        ]);
    }
}
