<?php

namespace App\Repositories;

use App\Models\Player;
use JetBrains\PhpStorm\Pure;

/**
 * Class Players
 * @package App\Repositories
 */
class Players extends Repository
{
    /**
     * Attractions constructor.
     * @param Player $model
     */
    #[Pure] public function __construct(Player $model)
    {
        parent::__construct($model);
    }

}
