<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fixture_id = $this->faker->unixTime;
        $fixture = FixtureFactory::new()->create(['id' => $fixture_id]);
        $fixture->save();
        $gameable_id = $this->faker->unixTime;
        $gameable = $this->faker->boolean ? SetFactory::new()->create(['id' => $gameable_id]) : LegFactory::new()->create(['id' => $gameable_id]);
        $gameable->save();
        return [
            'fixture_id' => $fixture_id,
            'gameable_type' => $gameable::class,
            'gameable_id' => $gameable_id
        ];
    }
}
