<?php

namespace App\Handlers;

use App\Http\Requests\Statistics\StatisticsIndexRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use App\Services\EasyGraph;
use App\Models\Game;
use App\Models\Fixture;
use App\Models\Set;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class StatisticsHandler
{
    /**
     * @param StatisticsIndexRequest $request
     * @return View|Factory
     */
    public function index(Fixture $fixture, StatisticsIndexRequest $request): View|Factory
    {
        $graph = new EasyGraph();
        $fixtureData = Fixture::with('sets.legs', 'player1', 'player2')->find(1);
        //dd($fixtureData);
        $graphOne = $graph->config(['type' => 'bar'])->setDataLabels(["foo", "bar", "test", "bruh"])->setChartLabels(1)->data([20, 2, 30, 20])->generateUrl();
        $graphTwo = $graph->config(['type' => 'line'])->setDataLabels(["foo", "bar", "test", "bruh"])->setChartLabels(1)->data([0, 20, 30, 10])->generateUrl();
        return view('statistics.index', ['graphOne' => $graphOne, 'graphTwo' => $graphTwo, 'fixture' => $fixtureData]);
    }
}
