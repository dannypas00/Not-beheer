<?php

namespace App\Repositories;

use App\Models\Fixture;

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
    public function __construct(Fixture $model)
    {
        parent::__construct($model);
    }
}
