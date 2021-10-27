<?php

namespace App\Repositories;

use App\Http\Requests\Turns\TurnStoreRequest;
use App\Models\Fixture;
use App\Models\Game;
use App\Models\Leg;
use App\Models\Set;
use App\Models\Turn;
use App\Services\ThrowToScoreService;
use Exception;
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

    /**
     * @param TurnStoreRequest $request
     * @return int|Leg
     * @throws Exception
     */
    public function createTurn(TurnStoreRequest $request): int|Leg
    {
        $leg = app(LegRepository::class)->get($request->leg);
        $fixture = app(FixtureRepository::class)->get($request->fixtureId);
        $turn = $this->turnFromRequest($request);
        $turns = app(LegRepository::class)->get($request->leg);

        $turn->remaining_score = $this->getTurnRemainingScore($turn, $fixture->start_score, $leg);
        $turn->save();

        dd($turn->remaining_score);

        if ($turn->remaining_score > 0) {
            return $turn->remaining_score;
        }

        return $this->startNewLeg($fixture);
    }

    /**
     * @param Fixture $fixture
     * @return Leg
     */
    private function startNewLeg(Fixture $fixture): Leg
    {
        $leg = new Leg();
        $game = new Game([
            'fixture_id' => $fixture->id,
            'gameable_type' => Leg::class,
        ]);

        if ($fixture->style === 'sets') {
            $set = app(SetRepository::class)->create();
            $leg->set_id = $set;
            $game->gameable_id = $set->id;
            $leg->save();
            $leg->refresh();
            $game->save();
            return $leg;
        }

        $leg->save();
        $leg->refresh();
        $game->gameable_id = $leg->id;
        $game->save();
        return $leg;
    }

    /**
     * @param Turn $turn
     * @param int $startScore
     * @param Leg $leg
     * @return int
     * @throws Exception
     */
    private function getTurnRemainingScore(Turn $turn, int $startScore, Leg $leg): int
    {
        $lastTurn = Turn::query()
            ->where('leg', '=', $leg->id)
            ->where('player', '=', $turn->player)
            ->latest('created_at')
            ->first();
        return ($lastTurn->remaining_score ?? $startScore) - app(ThrowToScoreService::class)->convertTurn($turn)->sum();
    }

    /**
     * @param TurnStoreRequest $request
     * @return Turn
     */
    public function turnFromRequest(TurnStoreRequest $request): Turn
    {
        return new Turn([
            'player'  => $request->player,
            'leg'     => $request->leg,
            'throw_1' => $request->throw1,
            'throw_2' => $request->throw2,
            'throw_3' => $request->throw3
        ]);
    }
}
