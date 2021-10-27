<?php

namespace App\Handlers;

use App\Http\Requests\Players\PlayerIndexRequest;
use App\Http\Requests\Players\PlayerStoreRequest;
use App\Http\Requests\Players\PlayerUpdateRequest;
use App\Models\Fixture;
use App\Models\Game;
use App\Models\Player;
use App\Repositories\FixtureRepository;
use App\Repositories\PlayerRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\JsonResponse;
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
        $players->transform(function (Player $player) {
            $player->setAttribute('winrate', app(PlayerHandler::class)->getFixtureWinrate($player));
            return $player;
        });
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
     * @param Player $player
     * @return View|Factory
     */
    public function editView(Player $player): View|Factory
    {
        return view('players.edit')
            ->with('player', $player);
    }

    /**
     * @param PlayerStoreRequest $request
     * @return Response
     */
    public function store(PlayerStoreRequest $request): Response
    {
        try {
            app(PlayerRepository::class)->createWithAvatar($request);
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
            app(PlayerRepository::class)->deleteWithAvatar($player);
            return new Response();
        } catch (\Exception $e) {
            return new Response($e->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param Player $player
     * @param PlayerUpdateRequest $request
     * @return Response
     */
    public function update(Player $player, PlayerUpdateRequest $request): Response
    {
        try {
            app(PlayerRepository::class)->update($request->validated(), $player);
            return new Response();
        } catch (\Exception $e) {
            return new Response($e->getMessage(), ResponseAlias::HTTP_NOT_ACCEPTABLE);
        }
    }

    /**
     * Returns a games / win ratio
     * @param Player $player
     * @return float
     */
    public function getFixtureWinrate(Player $player): float
    {
        $fixtureCount = app(FixtureRepository::class)->fixturesWithPlayer($player)->count();
        $winCount = app(FixtureRepository::class)->fixturesWonByPlayer($player)->count();
        return $winCount > 0 ? round($winCount / $fixtureCount, 2) : 0;
    }
}
