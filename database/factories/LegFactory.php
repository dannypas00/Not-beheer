<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Leg;
use App\Models\Set;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class LegFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leg::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'average_score' => 512,
            'winner'        => null
        ];
    }

    /**
     * @return Leg|Collection<Leg>
     */
    public function createTestModel(): Model|Collection
    {
        $fixture = FixtureFactory::new()->create();
        $fixture->save();
        $id = $this->faker->unixTime;
        return $this->for(
            Set::factory()
                ->afterCreating(
                    function (Set $set) use ($fixture) {
                        Game::factory()->create([
                            'fixture_id'    => $fixture->id,
                            'gameable_type' => Set::class,
                            'gameable_id'   => $set->id
                        ])->save();
                        $set->save();
                    }
                )
            ->create()
        )
            ->create([
                'id'            => $id,
                'average_score' => $this->faker->numberBetween(0, 180),
                'winner'        => $this->faker->boolean ? $fixture->player1 : $fixture->player2,
            ]);
    }
}
