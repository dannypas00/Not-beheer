<?php

namespace Database\Seeders;

use App\Models\Leg;
use Database\Factories\LegFactory;
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
        app(LegFactory::class)->count(20)->create();
    }
}
