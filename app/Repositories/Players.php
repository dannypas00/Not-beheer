<?php

namespace App\Repositories;

use App\Models\Player;

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
    public function __construct(Player $model)
    {
        parent::__construct($model);
    }
}
