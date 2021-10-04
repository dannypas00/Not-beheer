<?php

namespace App\Repositories;

use App\Models\Game;

/**
 * Class Games
 *
 * @package App\Repositories
 */
class Games extends Repository
{
    /**
     * Attractions constructor.
     *
     * @param Game $model
     */
    public function __construct(Game $model)
    {
        parent::__construct($model);
    }
}
