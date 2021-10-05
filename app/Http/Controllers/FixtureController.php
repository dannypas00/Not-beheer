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
     * @param StoreFixture $request
     * @return Application|Redirector|RedirectResponse
     * @throws Exception
     */
    public function store(StoreFixture $request): Application|RedirectResponse|Redirector
    {
        return app(FixtureHandler::class)->store($request);
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
        return app(FixtureHandler::class)->delete($fixture);
    }
}
