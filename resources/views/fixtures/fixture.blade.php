@extends('layouts.app')

@section('content')
    <div id="fixtureComponent" class="container">
        <div class="row">
            <div class ="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
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

    <div id="duplicate" style="visibility: hidden">
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
@endsection
