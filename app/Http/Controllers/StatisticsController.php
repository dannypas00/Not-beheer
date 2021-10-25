<?php

namespace App\Http\Controllers;

use App\Handlers\StatisticsHandler;
use App\Http\Requests\Statistics\StatisticsIndexRequest;
use Illuminate\Http\Request;
use App\Models\Fixture;

class StatisticsController extends AbstractController
{
    /**
     * Show the statistics from a game.
     *
     * @return Application|Factory|View
     */
    public function find(Fixture $fixture, StatisticsIndexRequest $request)
    {
        return app(StatisticsHandler::class)->index($fixture, $request);
    }
}
