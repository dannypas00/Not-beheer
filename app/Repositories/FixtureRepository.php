<?php

namespace App\Repositories;

use App\Models\Fixture;
use App\Models\Leg;
use App\Models\Player;
use App\Services\ThrowToScoreService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\Pure;

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
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->model->newQuery()->with(['city'])->get();
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

    public function turnAveragePerLeg(int $fixtureId)
    {
        $legs = Fixture::query()->whereKey($fixtureId)->with([
            'legs' => function (HasManyThrough $query) {
                $query->with(['turns']);
            }
        ])->get()->pluck('legs');
        return $legs->first()->map(function (Leg $leg) {
            $leg->turn_count = $leg->turns()->count();
            unset($leg['turns']);
            return $leg;
        });
    }

    /**
     * @param int $fixtureId
     * @return Collection
     */
    public function averageThrowsPerLeg(int $fixtureId): Collection
    {
        $result = Fixture::query()->whereKey($fixtureId)->with([
            'player1', 'player2', 'legs' => function (HasManyThrough $query) {
                $query->with(['turns']);
            }
        ])->get()->first();
        $legs = collect($result->toArray()['legs']);
        $playerIds = collect([$result->player_1, $result->player_2]);
        return $legs->map(function ($leg) use ($playerIds) {
            $turns = collect($leg['turns']);
            return [
                $playerIds[0] => $this->calculateAveragePlayerThrowForTurns($turns, $playerIds[0]),
                $playerIds[1] => $this->calculateAveragePlayerThrowForTurns($turns, $playerIds[1])
            ];
        });
    }

    /**
     * @param Collection $turns
     * @param int $playerId
     * @return Collection
     */
    private function calculateAveragePlayerThrowForTurns(Collection $turns, int $playerId): Collection
    {
        return collect($turns->where('player', '=', $playerId)->average(function ($turn) {
            $throws = [
                app(ThrowToScoreService::class)->convertThrow($turn['throw_1']),
                app(ThrowToScoreService::class)->convertThrow($turn['throw_2']),
                app(ThrowToScoreService::class)->convertThrow($turn['throw_3'])
            ];
            return array_sum($throws);
        }));
    }

    public function exportFixture(int $fixtureId): Collection
    {
        $collection = Fixture::query()
            ->whereKey($fixtureId)
            ->with(['player1', 'player2', 'winner', 'location', 'sets', 'legs'])
            ->get();
        return $this->cleanIds(
            $collection
        )->first();
    }

    /**
     * @param Collection $toClean
     * @return Collection
     */
    private function cleanIds(Collection $toClean): Collection
    {
        return $toClean->map(static function ($cleaningItem, $cleaningKey) {
            if ($cleaningKey === 'id') {
                return null;
            }
            if ($cleaningItem instanceof Model) {
                $cleaningItem = $cleaningItem->toArray();
            }
            if (is_countable($cleaningItem)) {
                return app(FixtureRepository::class)->cleanIds(new Collection($cleaningItem));
            }
            return $cleaningItem;
        });
    }
}
