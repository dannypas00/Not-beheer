<?php

namespace App\Repositories;

use App\Models\Fixture;
use JetBrains\PhpStorm\Pure;

/**
 * Class Fixtures
 * @package App\Repositories
 */
class Fixtures extends Repository
{
    /**
     * Attractions constructor.
     * @param Fixture $model
     */
    #[Pure] public function __construct(Fixture $model)
    {
        parent::__construct($model);
    }

}
