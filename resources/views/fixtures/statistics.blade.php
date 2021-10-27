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
                        <canvas id="average-graph"></canvas>
                    </div>
                    <div class="col">
                        <canvas id="throws-graph"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('js')
    <script type="application/javascript">
        $(document).ready(function () {
            createTurnCountChart();
            createAverageThrowsChart();

            function createAverageThrowsChart() {
                let averageThrowData = JSON.parse('{!! json_encode($averageThrows); !!}');
                let labels = [];
                let player1Stats = [];
                let player2Stats = [];
                 for (let i = 1; i < averageThrowData.length; i++) {
                     labels[i] = 'Leg ' + i;
                     player1Stats[i-1] = averageThrowData[i-1][{{ $fixture->player_1 }}][0];
                     player2Stats[i-1] = averageThrowData[i-1][{{ $fixture->player_2 }}][0];
                 }
                 console.log(player1Stats);
                 const data = {
                     labels: labels,
                     datasets: [
                         {
                             label: 'Average score per leg for ' + "{{ $fixture->player1->name }}",
                             backgroundColor: 'rgb(255, 99, 132)',
                             borderColor: 'rgb(255, 99, 132)',
                             data: player1Stats,
                         },
                         {
                             label: 'Average score per leg for ' + "{{ $fixture->player2->name }}",
                             backgroundColor: 'rgb(132, 99, 255)',
                             borderColor: 'rgb(132, 99, 255)',
                             data: player2Stats,
                         }
                     ]
                 };
                 let config = {
                     type: 'line',
                     data: data,
                     options: {}
                 };
                 const chart = new Chart(
                     $('#average-graph'),
                     config
                 )
            }

            function createTurnCountChart() {
                let turnAvgData = JSON.parse('{!! json_encode($averageTurnCount); !!}');
                let labels = [];
                for (let i = 1; i <= turnAvgData.length; i++) {
                    labels[i] = 'Leg ' + i;
                }
                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Average turns taken per leg',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: turnAvgData,
                    }]
                };
                let config = {
                    type: 'bar',
                    data: data,
                    options: {}
                };
                const chart = new Chart(
                    $('#throws-graph'),
                    config
                )
            }
        });
    </script>
@endsection
