@extends('layouts.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div id="fixtureComponent" class="container">
        <div class="row">
            <div class ="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <table class="table table-sm">
                                <thead>
                                <tr>
                                    <th>Player</th>
                                    <th>Set</th>
                                    <th>Leg</th>
                                    <th>Punten</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$fixture->player1->name}}</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                </tbody>
                                <tbody>
                                <tr>
                                    <td>{{$fixture->player2->name}}</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class ="col-6">
                <div class="mt-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="container">
                                <h5>Speler 1</h5>
                                    <div id="player1">

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
                                <h5>Speler 2</h5>
                                <div id="player2">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="duplicate" class="mt-3 mb-3" style="visibility: hidden">
        <div id="text" class="card-header"></div>
        <div class="input-group mb-3">
            <input type="text" tag="input" name="worp[]" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Worp 1" required minlength="1" maxlength="3">
            <input type="text" tag="input" name="worp[]" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Worp 2" required minlength="1" maxlength="3">
            <input type="text" tag="input" name="worp[]" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Worp 3" required minlength="1" maxlength="3">
        </div>
        </hr>
    </div>

    <script>
        let fixtureId = {!! $fixture->id !!};
    </script>


@endsection
