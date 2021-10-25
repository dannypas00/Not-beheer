<?php

namespace Tests\Feature;

use App\Models\Fixture;
use Tests\TestCase;

class FixturesRoutesTest extends TestCase
{
    public function testIndex()
    {
        $this->get(route('fixtures.index'))->assertViewHas('fixtures')->assertSuccessful()
            ->assertViewIs('fixtures.index');
    }

    public function testErrorOnPlayersNull()
    {
        Fixture::factory()->create([
            'player_1' => null,
            'player_2' => null
        ]);
        $this->get(route('fixtures.index'))->assertSuccessful();
    }
}
