<?php

namespace App\Repositories;

use App\Models\Set;

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
    public function __construct(Set $model)
    {
        parent::__construct($model);
    }
}
