@extends('layouts.app')

@section('content')

    @include('layouts.searchbar.search')

    <div class="mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success btn-sm float-end">Start een nieuwe wedstrijd</button>
                <h5>Overzicht van wedstrijden</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-light pb-0 mb-0">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type</th>
                        <th scope="col">Style</th>
                        <th scope="col">Length</th>
                        <th scope="col">Winner</th>
                        <th scope="col">Player 1</th>
                        <th scope="col">Player 2</th>
                        <th scope="col">Start Score</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fixtures as $fixture)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$fixture->type}}</td>
                            <td>{{$fixture->style}}</td>
                            <td>{{$fixture->length}}</td>
                            <td>{{$fixture->winner}}</td>
                            <td></td>
                            <td></td>
                            <td>{{$fixture->start_score}}</td>
                            <td>{{$fixture->date}}</td>

                            <td>
                                <button type="button" class="btn btn-secondary btn-sm float-end">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm float-end me-2">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
