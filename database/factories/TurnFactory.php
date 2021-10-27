<?php

namespace Database\Factories;

use App\Models\Fixture;
use App\Models\Game;
use App\Models\Leg;
use App\Models\Player;
use App\Models\Turn;
use Illuminate\Database\Eloquent\Factories\Factory;

class TurnFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Turn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'throw_1'   => $this->faker->boolean(90)
                ? $this->faker->numberBetween(1, 20) . $this->faker->randomElement(['T', 'D', '']) : 'M',
            'throw_2'   => $this->faker->boolean(90)
                ? $this->faker->numberBetween(1, 20) . $this->faker->randomElement(['T', 'D', '']) : 'BE',
            'throw_3'   => $this->faker->boolean(90)
                ? $this->faker->numberBetween(1, 20) . $this->faker->randomElement(['T', 'D', '']) : 'B'
        ];
    }
}
