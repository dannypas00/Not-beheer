<?php

namespace App\Repositories;

use App\Models\Leg;
use JetBrains\PhpStorm\Pure;

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
    #[Pure] public function __construct(Leg $model)
    {
        parent::__construct($model);
    }

}
