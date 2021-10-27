<?php

namespace App\Handlers;

use App\Http\Requests\Fixtures\FixtureIndexRequest;
use App\Http\Requests\Fixtures\FixtureStoreRequest;
use App\Models\Fixture;
use App\Models\Leg;
use App\Models\Player;
use App\Repositories\FixtureRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class FixtureHandler
{
    /**
     * @param FixtureIndexRequest $request
     * @return View|Factory
     */
    public function index(FixtureIndexRequest $request): Factory|View
    {
        $fixtures = collect(app(FixtureRepository::class)->all());
        $fixtures->transform(function (Fixture $fixture) {
            $city = $fixture->city()->first();
            $fixture->city->name = sprintf('%s (%s)', $city->name, $city->country()->first()->iso3);
            return $fixture;
        });
        return view('fixtures.index', ['fixtures' => $fixtures]);
    }

    /**
     * @return View|Factory
     */
    public function createView(): View|Factory
    {
        return view('fixtures.create')
            ->with('players', Player::all());
    }

    /**
     * @param FixtureStoreRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(FixtureStoreRequest $request): Application|RedirectResponse|Redirector
    {
        app(FixtureRepository::class)->create($request);
        return redirect()->route('fixtures.index');
    }

    /**
     * @param Fixture $fixture
     * @return RedirectResponse
     */
    public function destroy(Fixture $fixture): RedirectResponse
    {
        app(FixtureRepository::class)->delete($fixture);
        return redirect()->route('fixtures.index');
    }

    /**
     * @param int $fixtureId
     * @return array
     */
    public function export(int $fixtureId): array
    {
        $result = app(FixtureRepository::class)->exportFixture($fixtureId);
        return $result->toArray();
    }

    public function statistics(Fixture $fixture): View
    {
        $turnAverage = collect(app(FixtureRepository::class)
            ->turnAveragePerLeg($fixture->id))
            ->map(function (Leg $leg) {
                return $leg->toArray()['turn_count'];
            });
        $averageThrows = app(FixtureRepository::class)->averageThrowsPerLeg($fixture->id)->toArray();
        return view(
            'fixtures.statistics',
            [
                'averageTurnCount' => $turnAverage->toArray(),
                'averageThrows' => $averageThrows,
                'fixture' => $fixture,
                'player1' => $fixture->player1()->first(),
                'player2' => $fixture->player2()->first()
            ]
        );
    }
}
