<?php

namespace App\Handlers;

use App\Http\Requests\Fixtures\FixtureIndexRequest;
use App\Http\Requests\Fixtures\FixtureStoreRequest;
use App\Models\Fixture;
use App\Models\Game;
use App\Models\Leg;
use App\Models\Player;
use App\Models\Set;
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
        $setId = $set === null ? -1 : $set->first()['gameable_id'];
        $leg = -1;
        if ($setId === -1) {
            $leg = Game::query()->where('fixture_id', '=', $id)
                ->where('gameable_type', '=', Leg::class)
                ->with('gameable')->get();
        } else {
            $leg = $set[0]->gameable->load('legs')->legs->first();
        }
        $legId = $leg === null ? -1 : $leg['id'];
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
}
