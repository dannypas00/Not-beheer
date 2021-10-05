@extends('layouts.app')

@section('content')
    <div class="container">
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
                                    <div class="mt-3 mb-3">
                                        <div class="card-header" >
                                            <h10 >Beurt #1</h10>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" id="log" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Worp 1" required="required" minlength="2" maxlength="4">
                                            <input type="text" id="T2" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Worp 2" required="required" minlength="2" maxlength="4">
                                            <input type="text" id="T3" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Worp 3" required="required" minlength="2" maxlength="4">
                                        </div>
                                        </hr>
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
                                @for ($i = 10; $i >= 0; $i--)
                                    <div class="mt-3 mb-3">
                                        <div class="card-header" >
                                            <h10 >Beurt #{{$i}}</h10>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Worp 1">
                                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Worp 2">
                                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Worp 3">
                                        </div>
                                        </hr>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
