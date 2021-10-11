<?php

namespace Tests\Feature;

use Tests\TestCase;

class FixturesRoutesTest extends TestCase
{
    public function testIndex()
    {
        $this->get(route('fixtures.index'))->assertViewHas('fixtures')->assertSuccessful()
            ->assertViewIs('fixtures.index');
    }
}
