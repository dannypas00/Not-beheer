<?php

namespace App\Http\Controllers;

use App\Handlers\FixtureHandler;
use App\Http\Requests\Fixtures\FixtureIndexRequest;
use App\Http\Requests\Fixtures\FixtureStoreRequest;
use App\Http\Requests\StoreFixture;
use App\Models\Fixture;
use App\Models\Player;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class FixtureController extends AbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @param FixtureIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(FixtureIndexRequest $request): View|Factory|Application
    {
        return app(FixtureHandler::class)->index($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return app(FixtureHandler::class)->createView();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FixtureStoreRequest $request
     * @return Application|Redirector|RedirectResponse
     * @throws Exception
     */
    public function store(FixtureStoreRequest $request): Application|RedirectResponse|Redirector
    {
        return app(FixtureHandler::class)->store($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Fixture $fixture
     * @return Redirector|RedirectResponse|Application
     */
    public function destroy(Fixture $fixture): Redirector|RedirectResponse|Application
    {
        return app(FixtureHandler::class)->delete($fixture);
    }

    public static function getPlayer($fixtureID, $playerOrder)
    {
        return DB::table('player_fixtures')
            ->select('name')
        ->where('order', $playerOrder)
        ->where('fixture_id', $fixtureID)
        ->join('fixtures', 'player_fixtures.fixture_id', '=', 'fixtures.id')
        ->join('players', 'player_fixtures.player_id', '=', 'players.id')
            ->value('name');
    }
}
