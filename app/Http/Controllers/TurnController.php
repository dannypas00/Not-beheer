<?php

namespace App\Http\Controllers;

use App\Handlers\TurnHandler;
use App\Http\Requests\Turns\TurnIndexRequest;
use App\Http\Requests\Turns\TurnStoreRequest;
use App\Models\Turn;
use Illuminate\Http\Response;

class TurnController extends AbstractController
{
    /**
     * @param TurnIndexRequest $request
     * @return Response
     */
    public function index(TurnIndexRequest $request): Response
    {
        return app(TurnHandler::class)->index($request);
    }

    /**
     * @param TurnStoreRequest $request
     * @return Response
     */
    public function store(TurnStoreRequest $request): Response
    {
        return app(TurnHandler::class)->store($request);
    }

    /**
     * @param Turn $turn
     * @return Response
     */
    public function destroy(Turn $turn): Response
    {
        return app(TurnHandler::class)->destroy($turn);
    }
}
