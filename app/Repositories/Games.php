<?php

namespace App\Repositories;

use App\Models\Game;
use JetBrains\PhpStorm\Pure;

/**
 * Class Games
 * @package App\Repositories
 */
class Games extends Repository
{
    /**
     * Attractions constructor.
     * @param Game $model
     */
    #[Pure] public function __construct(Game $model)
    {
        parent::__construct($model);
    }

}
