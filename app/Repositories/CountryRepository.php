<?php

namespace App\Repositories;

use App\Models\City;
use App\Models\Country;
use App\Models\Fixture;
use App\Models\Player;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;
use PHPUnit\Framework\Constraint\Count;

/**
 * Class FixtureRepository
 * @package App\Repositories
 */
class CountryRepository extends AbstractRepository
{
    /**
     * Attractions constructor.
     *
     * @param Country $model
     */
    #[Pure] public function __construct(Country $model)
    {
        parent::__construct($model);
    }

    /**
     * @param Country $model
     * @param string|null $search
     */
    public function findCitiesByCountry(Country $model, ?string $search)
    {
        $model->cities()->where('name', 'like', sprintf('%%%s%%', $search));
    }
}
