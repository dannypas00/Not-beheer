<?php

namespace App\Repositories;

use App\Models\Player;

/**
 * Class PlayerRepository
 * @package App\Repositories
 */
class PlayerRepository extends AbstractRepository
{
    /**
     * Attractions constructor.
     *
     * @param Player $model
     */
    public function __construct(Player $model)
    {
        parent::__construct($model);
    }
}
