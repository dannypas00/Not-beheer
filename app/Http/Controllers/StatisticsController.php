<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EasyGraph;

class StatisticsController extends AbstractController
{
    public function find($gameId, EasyGraph $graph){
        $graphOne = $graph->config(['type' => 'bar'])->setDataLabels(["foo", "bar", "test", "bruh"])->setChartLabels(1)->data([20, 2, 30, 20])->generateUrl();
        $graphTwo = $graph->config(['type' => 'line'])->setDataLabels(["foo", "bar", "test", "bruh"])->setChartLabels(1)->data([0, 20, 30, 10])->generateUrl();
        
        return view('statistics.index')->withGraphOne($graphOne)->withGraphTwo($graphTwo);
    }
}
