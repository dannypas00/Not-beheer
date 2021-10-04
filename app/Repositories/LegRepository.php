<?php

namespace App\Repositories;

use App\Models\Leg;

/**
 * Class LegRepository
 * @package App\Repositories
 */
class LegRepository extends AbstractRepository
{
    /**
     * Attractions constructor.
     *
     * @param Leg $model
     */
    #[Pure] public function __construct(Leg $model)
    {
        parent::__construct($model);
    }
}
