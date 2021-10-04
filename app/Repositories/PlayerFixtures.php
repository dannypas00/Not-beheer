<?php

namespace App\Repositories;

use App\Models\PlayerFixture;

/**
 * Class PlayerFixtures
 *
 * @package App\Repositories
 */
class PlayerFixtures extends Repository
{
    /**
     * Attractions constructor.
     *
     * @param PlayerFixture $model
     */
    public function __construct(PlayerFixture $model)
    {
        parent::__construct($model);
    }
}
