<?php

namespace App\Http\Controllers;

use App\Models\Leg;
use App\Models\Turn;
use App\Services\ThrowToScoreService;

class LegController
{
    /**
     * @param Leg $leg
     * @return mixed
     */
    public function remainingScore(Leg $leg): int
    {
        return $leg->turns->last()->remaining_score;
    }
}
