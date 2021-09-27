<?php

namespace App\Repositories;

use App\Models\Set;
use JetBrains\PhpStorm\Pure;

/**
 * Class Sets
 * @package App\Repositories
 */
class Sets extends Repository
{
    /**
     * Attractions constructor.
     * @param Set $model
     */
    #[Pure] public function __construct(Set $model)
    {
        parent::__construct($model);
    }

}
