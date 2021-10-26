<?php

namespace App\Handlers;

use App\Http\Requests\Statistics\StatisticsIndexRequest;
use App\Models\Leg;
use App\Repositories\FixtureRepository;
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
     * @param Fixture $fixture
     * @return View|Factory
     */
    public function show(Fixture $fixture): View|Factory
    {
        $graph = new EasyGraph();
        $fixtureData = Fixture::with('sets.legs', 'player1', 'player2')->find(1);
        $turnAverage = collect(app(FixtureRepository::class)->turnAveragePerLeg($fixture->id))->map(function (Leg $leg) {
            return $leg->toArray()['turn_count'];
        });
        $averageThrows = app(FixtureRepository::class)->averageThrowsPerLeg($fixture->id)->toArray();
        return view('statistics.index', ['turnAverage' => $turnAverage->toArray(), 'graphTwo' => [], 'fixture' => $fixtureData]);
    }
}
