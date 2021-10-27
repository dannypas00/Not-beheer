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
        return $leg->turns->map(function (Turn $turn) {
            $result = app(ThrowToScoreService::class)->convertThrow($turn->throw1);
            $result += app(ThrowToScoreService::class)->convertThrow($turn->throw2);
            return $result + app(ThrowToScoreService::class)->convertThrow($turn->throw3);
        })->sum();
    }
}
