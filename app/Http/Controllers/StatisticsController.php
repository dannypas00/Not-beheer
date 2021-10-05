<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends AbstractController
{
    public function find($gameId){
        return view('statistics.index');
    }
}
