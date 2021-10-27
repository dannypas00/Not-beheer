<?php

namespace App\Repositories;

use App\Models\Fixture;
use App\Models\Leg;
use App\Models\Player;
use App\Models\Set;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
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

    /**
     * @throws \Exception
     */
    public function createFixture($request): void
    {
        $fixture = $this->create($request) ?? new Fixture();
        $style = $fixture->style ?? 'none';
        if ($style === 'legs') {
            $leg = app(LegRepository::class)->create([]);
            app(GameRepository::class)->create([
                'fixture_id' => $fixture->id,
                'gameable_type' => Leg::class,
                'gameable_id' => $leg->id
            ]);
        }
        if ($style === 'sets') {
            $set = app(SetRepository::class)->create([]);
            app(LegRepository::class)->create(['set_id' => $set->id]);
            app(GameRepository::class)->create([
                'fixture_id' => $fixture->id,
                'gameable_type' => Set::class,
                'gameable_id' => $set->id
            ]);
        }
    }

}
