<?php

namespace App\Repositories;

use App\Models\Fixture;
use App\Models\Turn;
use JetBrains\PhpStorm\Pure;

/**
 * Class FixtureRepository
 * @package App\Repositories
 */
class TurnRepository extends AbstractRepository
{
    /**
     * Attractions constructor.
     *
     * @param Turn $model
     */
    #[Pure] public function __construct(Turn $model)
    {
        parent::__construct($model);
    }

    public function createTurn($request)
    {
        //calculate new current score
        $turn = $this->create([
            'player'  => $request->player,
            'leg'     => $request->leg,
          //  'remaining_score' =>
            'throw_1' => $request->throw1,
            'throw_2' => $request->throw2,
            'throw_3' => $request->throw3
        ]);

       // $currentScore;

        if (true) {
            $fixture = Fixture::all()->where('id', $request->fixtureId)->first();
            $style = $fixture->style ?? 'none';
            if ($style === 'legs') {
                $leg = app(LegRepository::class)->create([]);
                app(GameRepository::class)->create([
                    'fixture_id' => $fixture->id,
                    'gameable_type' => 'leg',
                    'gameable_id' => $leg->id
                ]);
                return $leg;
            }
            if ($style === 'sets') {
                $set = app(SetRepository::class)->create([]);
                $leg = app(LegRepository::class)->create(['set_id' => $set->id]);
                app(GameRepository::class)->create([
                    'fixture_id' => $fixture->id,
                    'gameable_type' => 'set',
                    'gameable_id' => $set->id
                ]);
                return $leg;
            }
        }
    }
}
