<?php

namespace App\Repositories;

use App\Models\Leg;

/**
 * Class Legs
 * @package App\Repositories
 */
class Legs extends Repository
{
    /**
     * Attractions constructor.
     * @param Leg $model
     */
    public function __construct(Leg $model)
    {
        parent::__construct($model);
    }
}
