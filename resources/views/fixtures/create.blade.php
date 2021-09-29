@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class ="col-6">
                <div class="mt-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="container">
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
                    </div>
                </div>
            </div>
            <div class ="col-6">
                <div class="mt-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="container">
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
        </div>
        <div class="row">
            <div class ="col-6">
                <div class="mt-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="container">
                                <h5>Selecteer speltype</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Legs
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Sets
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class ="col-6">
                <div class="mt-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="container">
                                <h5>Aantal sets/legs</h5>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"></div>
                                    <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="container">
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
    </div>
@endsection
