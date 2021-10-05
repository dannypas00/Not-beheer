<?php

namespace Database\Factories;

use App\Models\Player;
use App\Providers\FakerServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imageFaker = \Faker\Factory::create('nl_NL');
        $imageFaker->addProvider(new FakerPicsumImagesProvider($imageFaker));
        return [
            'image' => $imageFaker->imageUrl,
            'name'  => $this->faker->name
        ];
    }
}
