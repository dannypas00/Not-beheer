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
        $gameable = $this->faker->boolean ? SetFactory::new()->create() : LegFactory::new()->create();
        return [
            'fixture_id' => null,
            'gameable_type' => $gameable::class,
            'gameable_id' => $gameable->id
        ];
    }
}
