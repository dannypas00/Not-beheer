<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayer;
use App\Models\Player;
use App\Repositories\Players;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class PlayersController extends AbstractController
{

    /**
     * @var Players
     */
    private Players $players;

    /**
     * @param Players $players
     */
    public function __construct(Players $players)
    {
        $this->players = $players;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('players.index')
            ->with('players', $this->players->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePlayer $request
     * @return Application|Redirector|RedirectResponse
     * @throws Exception
     */
    public function store(StorePlayer $request): Application|RedirectResponse|Redirector
    {
        $this->players->create($request);
        return redirect()->route('players.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Player $player
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Player $player): Redirector|RedirectResponse|Application
    {
        $this->players->delete($player);
        return redirect()->route('players.index');
    }
}
