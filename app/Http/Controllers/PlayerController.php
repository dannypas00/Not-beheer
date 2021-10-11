<?php

namespace App\Http\Controllers;

use App\Handlers\PlayerHandler;
use App\Http\Requests\Players\PlayerIndexRequest;
use App\Http\Requests\Players\PlayerStoreRequest;
use App\Http\Requests\Players\PlayerUpdateRequest;
use App\Models\Player;
use App\Repositories\PlayerRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

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
     * @return RedirectResponse|Redirector|Application
     */
    public function store(PlayerStoreRequest $request): Application|RedirectResponse|Redirector
    {
        app(PlayerHandler::class)->store($request);
        return redirect(route('players.index'));
    }

    /**
     * @param Player $player
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Player $player): Application|RedirectResponse|Redirector
    {
        app(PlayerHandler::class)->destroy($player);
        return redirect(route('players.index'));
    }

    /**
     * @param Player $player
     * @return View|Factory
     */
    public function edit(Player $player): View|Factory
    {
        return app(PlayerHandler::class)->editView($player);
    }

    /**
     * @param Player $player
     * @param PlayerUpdateRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Player $player, PlayerUpdateRequest $request): Application|RedirectResponse|Redirector
    {
        app(PlayerHandler::class)->update($player, $request);
        return redirect(route('players.index'));
    }
}
