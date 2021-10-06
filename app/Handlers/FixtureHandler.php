<?php

namespace App\Handlers;

use App\Http\Requests\Fixtures\FixtureIndexRequest;
use App\Http\Requests\Fixtures\FixtureStoreRequest;
use App\Models\Fixture;
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
            return redirect(route('fixtures.index'));
    }
    /**
     * @param Fixture $fixture
     * @return Response
     */
    public function delete(Fixture $fixture): Response
    {
        try {
            app(FixtureRepository::class)->delete($fixture);
            return new Response();
        } catch (\Exception $e) {
            return new Response($e->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
