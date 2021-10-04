<?php

namespace App\Repositories;

use App\Models\Set;

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
    public function __construct(Set $model)
    {
        parent::__construct($model);
    }

}
