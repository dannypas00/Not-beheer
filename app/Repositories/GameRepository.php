<?php

namespace App\Repositories;

use App\Models\Game;

/**
 * Class GameRepository
 * @package App\Repositories
 */
class GameRepository extends AbstractRepository
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
