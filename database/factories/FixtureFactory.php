<?php

namespace Database\Factories;

use App\Models\Fixture;
use Illuminate\Database\Eloquent\Factories\Factory;

class FixtureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fixture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return
            [
                'type' => $this->faker->boolean ? 'best_of' : 'first_to',
                'style' => $this->faker->boolean ? 'sets' : 'legs',
                'length' => $this->faker->numberBetween(3, 15),
                'start_score' => $this->faker->numberBetween(180, 1024),
                'average_score' => (double) $this->faker->numberBetween(0, 180),
                'date' => $this->faker->date
            ];
    }
}