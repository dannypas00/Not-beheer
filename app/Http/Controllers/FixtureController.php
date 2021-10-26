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
use Illuminate\Http\JsonResponse;
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
     * @param FixtureStoreRequest $request
     * @return RedirectResponse
     */
    public function store(FixtureStoreRequest $request): RedirectResponse
    {
        return app(FixtureHandler::class)->store($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Fixture $fixture
     * @return RedirectResponse
     */
    public function destroy(Fixture $fixture): RedirectResponse
    {
        return app(FixtureHandler::class)->destroy($fixture);
    }

    /**
     * @param int $fixtureId
     * @return JsonResponse
     */
    public function export(int $fixtureId): JsonResponse
    {
        return new JsonResponse(app(FixtureHandler::class)->export($fixtureId));
    }
}
