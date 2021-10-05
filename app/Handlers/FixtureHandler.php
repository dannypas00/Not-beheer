<?php

namespace App\Handlers;

use App\Http\Requests\Fixtures\FixtureIndexRequest;
use App\Http\Requests\Fixtures\FixtureStoreRequest;
use App\Models\Fixture;
use App\Repositories\FixtureRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class FixtureHandler
{
    /**
     * @param FixtureIndexRequest $request
     * @return View|Factory
     */
    public function index(FixtureIndexRequest $request): Factory|View
    {
        $fixtures = app(FixtureRepository::class)->all();
        return view('fixture.index', ['fixtures' => $fixtures]);
    }
    /**
     * @return View|Factory
     */
    public function createView(): View|Factory
    {
        return view('fixture.create');
    }
    /**
     * @param FixtureStoreRequest $request
     * @return Response
     */
    public function store(FixtureStoreRequest $request): Response
    {
        try {
            app(FixtureRepository::class)->create($request);
            return new Response();
        } catch (\Exception $e) {
            return new Response($e->getMessage(), ResponseAlias::HTTP_NOT_ACCEPTABLE);
        }
    }
    /**
     * @param Fixture $fixture
     * @return Response
     */
    public function destroy(Fixture $fixture): Response
    {
        try {
            app(FixtureRepository::class)->delete($fixture);
            return new Response();
        } catch (\Exception $e) {
            return new Response($e->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
