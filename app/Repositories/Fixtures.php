<?php

namespace App\Repositories;

use App\Models\Fixture;

/**
 * Class Fixtures
 *
 * @package App\Repositories
 */
class Fixtures extends Repository
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
