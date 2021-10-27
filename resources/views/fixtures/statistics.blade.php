<?php

?>
@extends('layouts.app')

@section('content')
    <div class="mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <h5>Statistieken</h5>
            </div>
            <div class="card-body">
                <div class="row row-cols-md-3">
                    <div class="col text-center">
                        <img width="300" class="img-thumbnail rounded" src="{{$player1->image}}">
                        <h2>{{$player1->name}}</h2>
                    </div>
                    <div class="col text-center">
                        <span>{{$fixture->date}}</span>
                        <h2>2 - 4</h2>
                    </div>
                    <div class="col text-center">
                        <img width="300" class="img-thumbnail rounded " src="{{$player2->image}}">
                        <h2>{{$player2->name}}</h2>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-3">
                    <div class="col">
                        <canvas id="player1-average-graph"></canvas>
                    </div>
                    <div class="col">
                        <canvas id="player2-average-graph"></canvas>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-3">
                    <canvas id="throws-graph"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('js')
    <script type="application/javascript">
        $(document).ready(function () {
            let turnAvgData = JSON.parse("{!!json_encode($turnAverage);!!}");
            console.log(turnAvgData);
            const data = {
                labels: [

                ],
                datasets: [{
                    label: 'My First dataset',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45],
                }]
            };
            let avgConfig = {
                type: 'line',
                data: data,
                options: {}
            };
            const player1Chart = new Chart(
                $('#player1-average-graph'),
                avgConfig
            )
        });
    </script>
@endsection
