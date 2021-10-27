<?php

namespace App\Handlers;

use App\Http\Requests\Fixtures\FixtureIndexRequest;
use App\Http\Requests\Fixtures\FixtureStoreRequest;
use App\Models\Fixture;
use App\Models\Leg;
use App\Models\Game;
use App\Models\Player;
use App\Models\Set;
use App\Repositories\FixtureRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

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
        return view('fixtures.create', ['players' => Player::all()]);
    }

    /**
     * @param int $id
     * @return View|Factory
     */
    public function show(int $id): View|Factory
    {
        $fixture = Fixture::query()->where("id", $id)->first();
        $set = Game::query()->where('fixture_id', '=', $id)
                ->where('gameable_type', '=', Set::class)
                ->with('gameable')->get();
        $setId = $set === null ? null : $set->first()['gameable_id'];
        if ($setId === -1) {
            $leg = Game::query()->where('fixture_id', '=', $id)
                ->where('gameable_type', '=', Leg::class)
                ->with('gameable')->get();
        } else {
            $leg = Leg::query()->where('set_id', '=', $setId)->first();
        }
        $legId = $leg === null ? null : $leg['id'];
        return view('fixtures.fixture', [
            'fixture' => $fixture,
            'setId' => $setId,
            'legId' => $legId
            ]);
    }

    /**
     * @param FixtureStoreRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(FixtureStoreRequest $request): Application|RedirectResponse|Redirector
    {
        //app(FixtureRepository::class)->create($request);
        app(FixtureRepository::class)->createFixture($request);
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
