<?php

namespace App\Repositories;

use App\Models\City;
use App\Models\Fixture;
use App\Models\Player;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;

/**
 * Class FixtureRepository
 * @package App\Repositories
 */
class CityRepository extends AbstractRepository
{
    /**
     * Attractions constructor.
     *
     * @param City $model
     */
    #[Pure] public function __construct(City $model)
    {
        parent::__construct($model);
    }

    public function getCityWithCountry(int $cityId): Collection
    {
        return City::query()
            ->whereKey($cityId)
            ->with('country')->get();
    }

    /**
     * @param string|null $search
     * @return Collection
     */
    public function findCitiesWithCountry(?string $search): Collection
    {
        $cities = $this->findCities($search)->get();
        $result = collect($cities);
        return $result;
    }

    /**
     * @param string|null $search
     * @return Builder
     */
    public function findCities(?string $search): Builder
    {
        return City::query()
            ->where('name', 'like', sprintf('%%%s%%', $search))
            ->with('country');
    }
}
