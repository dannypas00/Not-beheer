<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFixture;
use App\Http\Requests\StorePlayer;
use App\Models\Fixture;
use App\Models\Player;
use App\Repositories\Players;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class FixturesController extends AbstractController
{
    /**
     * @var Fixture
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
    public function index(): View|Factory|Application
    {
        return view('fixtures.index')
            ->with('players', Player::all());
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
     * Store a newly created resource in storage.
     *
     * @param StoreFixture $request
     * @return Application|Redirector|RedirectResponse
     * @throws Exception
     */
    public function store(StoreFixture $request): Application|RedirectResponse|Redirector
    {
        $this->fixtures->create($request);
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
}
