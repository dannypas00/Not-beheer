<?php

namespace App\Handlers;

use App\Http\Requests\Players\PlayerIndexRequest;
use App\Http\Requests\Players\PlayerRequest;
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
     * @param PlayerRepository $playerRepository
     * @return View|Factory
     */
    public function index(PlayerIndexRequest $request, PlayerRepository $playerRepository): View|Factory
    {
        $players = $playerRepository->all();
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
     * @param PlayerRequest $request
     * @param PlayerRepository $playerRepository
     * @return Response
     */
    public function store(PlayerRequest $request, PlayerRepository $playerRepository): Response
    {
        try {
            $playerRepository->create($request);
            return new Response();
        } catch (\Exception $e) {
            return new Response($e->getMessage(), ResponseAlias::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * @param Player $player
     * @param PlayerRepository $playerRepository
     * @return Response
     */
    public function destroy(Player $player, PlayerRepository $playerRepository): Response
    {
        try {
            $playerRepository->delete($player);
            return new Response();
        } catch (\Exception $e) {
            return new Response($e->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
