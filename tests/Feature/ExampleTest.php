<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{

    /**
     * A basic test example to see if this runs at all
     */
    public function testBasicAssertion()
    {
        $this->assertTrue(true);
    }

    /**
     * A basic test to see if the routing for unauthenticated users works correctly
     */
    public function testUnauthenticatedBasicRouting()
    {
        $response = $this->get('/');
        $response->assertRedirect(route('players.index'));
    }
}
