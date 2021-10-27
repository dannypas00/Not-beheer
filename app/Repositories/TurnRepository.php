<?php

namespace App\Repositories;

use App\Models\Fixture;
use App\Models\Leg;
use App\Models\Turn;
use App\Services\ThrowToScoreService;
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
        $fixture = Fixture::all()->where('id', $request->fixtureId)->first();
        $turn = new Turn([
            'player'  => $request->player,
            'leg'     => $request->leg,
            'throw_1' => $request->throw1,
            'throw_2' => $request->throw2,
            'throw_3' => $request->throw3
        ]);
        $turns = app(LegRepository::class)
            ->get($request->leg);
        if ($turns !== null) {
            $turn->remaining_score = $turns->turns
                    ->last()
                    ->remaining_score
                ?? $fixture->start_score - app(ThrowToScoreService::class)
                    ->convertTurn($turn)
                    ->sum();
        } else {
            $turn->remaining_score = $fixture->start_score - app(ThrowToScoreService::class)
                ->convertTurn($turn)
                ->sum();
        }

        $turn->save();
        dd($turn);
       // $currentScore;

        if ($turn->remaining_score === 0) {
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
