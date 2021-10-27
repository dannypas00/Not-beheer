<?php

namespace App\Repositories;

use App\Handlers\FixtureHandler;
use App\Models\Fixture;
use App\Models\Player;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\Pure;
use phpDocumentor\Reflection\Types\This;

/**
 * Class FixtureRepository
 * @package App\Repositories
 */
class FixtureRepository extends AbstractRepository
{
    /**
     * Attractions constructor.
     *
     * @param Fixture $model
     */
    #[Pure] public function __construct(Fixture $model)
    {
        parent::__construct($model);
    }
    /**
     * Returns an eloquent builder with all games (sets or legs) the given player has won
     * @param Player $player
     * @return Builder
     */
    public function fixturesWonByPlayer(Player $player): Builder
    {
        return Fixture::query()->whereHas('winner', function (Builder $query) use ($player) {
            $query->whereKey($player->id);
        });
    }

    /**
     * Returns an eloquent builder with all fixtures the player is part of
     * @param Player $player
     * @param Builder|null $query
     * @return Builder
     */
    public function fixturesWithPlayer(Player $player, ?Builder $query = null): Builder
    {
        $query = $query ?? Fixture::query();
        return $query
            ->whereHas('player1', function (Builder $query) use ($player) {
                $query->whereKey($player->id);
            })
            ->orWhereHas('player2', function (Builder $query) use ($player) {
                $query->whereKey($player->id);
            });
    }

    public function createFixture($request): void
    {
        $fixture = $this->create($request) ?? new Fixture();
        $style = $fixture->style ?? 'none';
        if ($style === 'legs') {
            $leg = app(LegRepository::class)->create([]);
            app(GameRepository::class)->create([
                'fixture_id' => $fixture->id,
                'gameable_type' => 'leg',
                'gameable_id' => $leg->id
                ]);
        }
        if ($style === 'sets') {
            $set = app(SetRepository::class)->create([]);
            $leg = app(LegRepository::class)->create(['set_id' => $set->id]);
            app(GameRepository::class)->create([
                'fixture_id' => $fixture->id,
                'gameable_type' => 'set',
                'gameable_id' => $set->id
            ]);
        }
    }
}
