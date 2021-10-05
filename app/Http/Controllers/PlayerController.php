<?php

namespace App\Http\Controllers;

use App\Handlers\PlayerHandler;
use App\Http\Requests\Players\PlayerIndexRequest;
use App\Http\Requests\Players\PlayerStoreRequest;
use App\Models\Player;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class PlayerController extends AbstractController
{
    /**
     * @param PlayerIndexRequest $request
     * @return View|Factory
     */
    public function index(PlayerIndexRequest $request): View|Factory
    {
        return app(PlayerHandler::class)->index($request);
    }

    /**
     * @return View|Factory
     */
    public function create(): View|Factory
    {
        return app(PlayerHandler::class)->createView();
    }

    /**
     * @param PlayerStoreRequest $request
     * @return Response
     */
    public function store(PlayerStoreRequest $request): Response
    {
        return app(PlayerHandler::class)->store($request);
    }

    /**
     * @param Player $player
     * @return Response
     */
    public function destroy(Player $player): Response
    {
        return app(PlayerHandler::class)->destroy($player);
    }
}
