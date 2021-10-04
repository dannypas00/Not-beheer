<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Repositories\Fixtures;
use App\Repositories\PlayerFixtures;

class FixturesController extends AbstractController
{
    private Fixtures $fixtures;

    public function __construct(Fixtures $fixtures)
    {
        $this->fixtures = $fixtures;
    }

    public function index():View|Factory|Application
    {
        return view('fixtures.index')
            ->with('fixtures',$this->fixtures->all());

    }

    public static function getPlayer($fixtureID, $playerOrder)
    {
        $player= DB::table('player_fixtures')
            ->select('name')
            ->join('players', 'player_fixtures.player_id', '=', 'players.id')
            ->join('fixtures', 'player_fixtures.fixture_id', '=', 'fixtures.id')
            ->where('fixture_id', $fixtureID)
            ->where('order', $playerOrder)
            ->value('name');
        return $player;
    }
}
