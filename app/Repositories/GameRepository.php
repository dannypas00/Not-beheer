<?php

namespace App\Repositories;

use App\Models\Fixture;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\Pure;

/**
 * Class GameRepository
 * @package App\Repositories
 */
class GameRepository extends AbstractRepository
{
    /**
     * Attractions constructor.
     *
     * @param Game $model
     */
    #[Pure] public function __construct(Game $model)
    {
        parent::__construct($model);
    }

    /**
     * @param Player $player
     * @return mixed
     */
    public function gamesWonByPlayer(Player $player): Builder
    {
        return Game::query()
            ->whereHas('gameable', function (Builder $query) use ($player) {
                $query->whereHas('winner', function (Builder $query) use ($player) {
                    $query->whereKey($player->id);
                });
            });
    }

    /**
     * Returns an eloquent builder with all games (sets or legs) the given player is part of
     * @param Player $player
     * @param Builder|null $query
     * @return Builder
     */
    public function gamesWithPlayer(Player $player, ?Builder $query = null): Builder
    {
        $query = $query ?? Game::query();
        return $query->whereHas('fixture', function (Builder $query) use ($player) {
            app(FixtureRepository::class)->fixturesWithPlayer($player, $query);
        });
    }
}
