<?php

namespace App\Http\Controllers;

use App\Handlers\FixtureHandler;
use App\Http\Requests\Fixtures\FixtureIndexRequest;
use App\Http\Requests\StoreFixture;
use App\Models\Fixture;
use App\Models\Player;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

use Illuminate\Support\Facades\DB;


class FixtureController extends AbstractController
{
    /**
     * @param FixtureIndexRequest $request
     * @return View|Factory
     */
    private Fixture $fixtures;

    /**
     * @param Fixture $fixture
     */
    public function __construct(Fixture $fixture)
    {
        $this->fixtures = $fixture;
    }

    /**
     * Display a listing of the resource.
     *
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
        return view('fixtures.create')
            ->with('players', Player::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function fixture(): View|Factory|Application
    {
        return view('fixtures.fixture');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFixture $request
     * @return Application|Redirector|RedirectResponse
     * @throws Exception
     */
    public function store(StoreFixture $request): Application|RedirectResponse|Redirector
    {
        $this->fixtures->store($request);
        return redirect()->route('fixtures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Fixture $fixture
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Fixture $fixture): Redirector|RedirectResponse|Application
    {
        $this->fixtures->delete($fixture);
        return redirect()->route('fixtures.index');
    }

    public static function getPlayer($fixtureID, $playerOrder)
    {
        $player = DB::table('player_fixtures')
            ->select('name')
        ->where('order', $playerOrder)
        ->where('fixture_id', $fixtureID)
        ->join('fixtures', 'player_fixtures.fixture_id', '=', 'fixtures.id')
        ->join('players', 'player_fixtures.player_id', '=', 'players.id')
            ->value('name');


        return $player;


}
}

