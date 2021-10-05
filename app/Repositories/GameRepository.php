<?php

namespace App\Repositories;

use App\Models\Game;
use JetBrains\PhpStorm\Pure;

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
    #[Pure] public function __construct(Game $model)
    {
        parent::__construct($model);
    }
}
