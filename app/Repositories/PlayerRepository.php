<?php

namespace App\Repositories;

use App\Models\Player;
use JetBrains\PhpStorm\Pure;

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
    #[Pure] public function __construct(Player $model)
    {
        parent::__construct($model);
    }
}
