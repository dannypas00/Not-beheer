<?php

namespace App\Handlers;

use App\Http\Requests\Players\PlayerIndexRequest;
use App\Http\Requests\Players\PlayerStoreRequest;
use App\Http\Requests\Players\PlayerUpdateRequest;
use App\Models\Player;
use App\Repositories\PlayerRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PlayerHandler
{
    /**
     * @param PlayerIndexRequest $request
     * @return View|Factory
     */
    public function index(PlayerIndexRequest $request): View|Factory
    {
        $players = app(PlayerRepository::class)->all();
        return view('players.index', ['players' => $players]);
    }

    /**
     * @return View|Factory
     */
    public function createView(): View|Factory
    {
        return view('players.create');
    }

    /**
     * @param PlayerStoreRequest $request
     * @return Response
     */
    public function store(PlayerStoreRequest $request): Response
    {
        try {
            app(PlayerRepository::class)->create($request);
            return new Response();
        } catch (\Exception $e) {
            return new Response($e->getMessage(), ResponseAlias::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * @param Player $player
     * @return Response
     */
    public function destroy(Player $player): Response
    {
        try {
            app(PlayerRepository::class)->delete($player);
            return new Response();
        } catch (\Exception $e) {
            return new Response($e->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param PlayerUpdateRequest $request
     * @return Response
     */
    public function update(PlayerUpdateRequest $request): Response
    {
        try {
            app(PlayerRepository::class)->update($request);
            return new Response();
        } catch (\Exception $e) {
            return new Response($e->getMessage(), ResponseAlias::HTTP_NOT_ACCEPTABLE);
        }
    }
}
