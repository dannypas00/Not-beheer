<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Repositories\PlayerRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PlayersRoutesTest extends TestCase
{
    public array $data = [
        'name' => 'John Doe',
    ];

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
        $this->post(route('players.store'), $this->data)
            ->assertRedirect(route('players.index'));
    }

    public function testDeletePlayer()
    {
        $player = Player::factory()->create();
        $response = $this->delete(route('players.destroy', ['player' => $player['id']]));
        $this->assertSoftDeleted('players', ['id' => $player['id']]);
        $response->assertRedirect(route('players.index'));
    }

    public function testUpdatePlayer()
    {
        $player = Player::factory()->create();
        $attrs = collect(Player::factory()->make()->getAttributes())->except('image')->toArray();
        $attrs['id'] = $player->id;
        $this->put(route('players.update', ['player' => $player['id']]), $attrs)
            ->assertRedirect(route('players.index'));
    }

}
