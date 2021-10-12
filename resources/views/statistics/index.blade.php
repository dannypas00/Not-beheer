<?php

?>
@extends('layouts.app')

@section('content')

    @include('layouts.searchbar.search')

    <div class="mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <h5>Statistieken</h5>
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-3">
                    <div class="col">
                        <img class="responsive" src="{{$graphOne}}">
                    </div>
                    <div class="col">
                        <img class="responsive" src="{{$graphTwo}}">
                    </div>
                </div>
                <div class="row">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Best of 3 of 5</th>
                            <th>Set</th>
                            <th>Leg</th>
                            <th>Punten</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Nam</td>
                            <td>1</td>
                            <td>1</td>
                            <td>80</td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <td>Mathijs</td>
                            <td>2</td>
                            <td>1</td>
                            <td>240</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
