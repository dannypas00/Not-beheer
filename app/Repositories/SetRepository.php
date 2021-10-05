<?php

namespace App\Repositories;

use App\Models\Set;
use JetBrains\PhpStorm\Pure;

/**
 * Class SetRepository
 * @package App\Repositories
 */
class SetRepository extends AbstractRepository
{
    /**
     * Attractions constructor.
     *
     * @param Set $model
     */
    #[Pure] public function __construct(Set $model)
    {
        parent::__construct($model);
    }
}
