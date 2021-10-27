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

            <div class ="col-12">
                <div class="mt-3 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="container">
                                <div id="setOrLegPosition">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="turnDuplicate" style="visibility: hidden">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button id="text" tabindex="-1" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDuplicate" aria-expanded="true">

                </button>
            </h2>
            <div id="collapseDuplicate" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <div class="input-group mb-3">
                        <input type="text" tag="input" name="worp[]" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Worp 1" required="required" minlength="1" maxlength="3">
                        <input type="text" tag="input" name="worp[]" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Worp 2" required="required" minlength="1" maxlength="3">
                        <input type="text" tag="input" name="worp[]" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Worp 3" required="required" minlength="1" maxlength="3">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="legDuplicate" style="visibility: hidden">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button id="text" tabindex="-1" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDuplicate" aria-expanded="true">

                </button>
            </h2>
            <div id="collapseDuplicate" class="accordion-collapse collapse show">
                <div id='turnsHere'class="accordion-body">
                    <div class="row">
                        <div class ="col-6">
                            <div class="mt-3 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="container">
                                            <h5>Speler 1</h5>
                                            <div id="player1_">

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
                                            <div id="player2_">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="setDuplicate" style="visibility: hidden">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button id="text" tabindex="-1" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDuplicate" aria-expanded="true">

                </button>
            </h2>
            <div id="collapseDuplicate" class="accordion-collapse collapse show">
                <div id='legPosition'class="accordion-body">

                </div>
            </div>
        </div>
        </hr>
    </div>

    <script>
        let fixture = {!! $fixture !!};
        let setId = {!! $setId !!};
        let legId = {!! $legId !!};
    </script>


@endsection
