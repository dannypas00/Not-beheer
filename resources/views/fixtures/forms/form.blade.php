<?php

?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-3 mb-3">
            <div class="card">
                <div class="card-header">
                    <h1>VERSIE 2</h1>
{{--                        Spelers--}}
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-3 mb-3">
                                <h5>Speler 1</h5>
                                <label>
                                    <select class="form-select">
                                        @foreach($players as $player)
                                            <option value="{{$player->id}}">{{$player->name}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-3 mb-3">
                                <h5>Speler 2</h5>
                                <label>
                                    <select class="form-select">
                                        @foreach($players as $player)
                                            <option value="{{$player->id}}">{{$player->name}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--                        Speltypes--}}
            <div class="mt-3 mb-3">
                <div class="card">
                    <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <div class="mt-3 mb-3">
                                <h5>Selecteer speltype</h5>
                                <label>
                                    <select class="form-select">
                                        <option value="FirstTo">First to</option>
                                        <option value="BestOf">Best of</option>
                                    </select>
                                </label>
                            </div>
                            <div class="mt-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                           id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Legs
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                           id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Sets
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3 mb-3">

                            </div>
                        </div>
                        <div class ="col-6">
{{--            Sets/legs & Beginscore--}}
                            <div class="mt-3 mb-3">
                                <h5>Aantal sets/legs</h5>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"></div>
                                    <input type="number" style="max-width: 80px" class="form-control"
                                           aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="mt-3 mb-3">
                                <h5>Beginscore</h5>
                                <label>
                                    <select class="form-select">
                                        <option value="301">301</option>
                                        <option value="501">501</option>
                                        <option value="701">701</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="mt-3 mb-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5>Tijd en datum</h5>
                                <h1>PLACEHOLDER</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 mb-3">
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </div>
    </div>


@endsection
