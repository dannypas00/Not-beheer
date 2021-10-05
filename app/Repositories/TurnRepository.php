<?php

namespace App\Repositories;

use App\Models\Turn;
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
}
