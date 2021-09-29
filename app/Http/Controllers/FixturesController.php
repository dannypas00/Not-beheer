<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Repositories\Fixtures;

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
}
