<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Repositories\PlayerRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PlayersRoutesTest extends TestCasePlayersRoutesTest
{
    public function testIndex()
    {
        $this->get(route('players.index'))->assertSuccessful()->assertViewIs('players.index');
    }

    public function testCreateView()
    {
        $this->get(route('players.create'))->assertSuccessful()->assertViewIs('players.create');
    }

    public function testCreatePlayer()
    {
        $this->post(route('players.store'), ['name' => 'TestPlayer'])->assertSuccessful();
    }

    public function testDeletePlayer()
    {
        $player = new Player(['name' => 'TestDeletePlayer']);
        $player->save();
        $this->delete(route('players.destroy', ['player' => $player->id]))->assertSuccessful();
    }

    public function testUpdatePlayer()
    {
        $player = Player::factory()->create();
        $attrs = collect(Player::factory()->make()->getAttributes())->except('image')->toArray();
        $attrs['id'] = $player->id;
        $this->put(route('players.update'), $attrs)->assertSuccessful();
    }
}
