<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayer;
use App\Repositories\Players;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return Response
     */
    public function store(StorePlayer $request): Response
    {
        dd('test');
        dd($request);
//        dd($request, $request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
