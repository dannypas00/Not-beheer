@extends('layouts.app')

@section('content')

    @include('layouts.searchbar.search')

    <div class="mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <a href="{{route('fixtures.create')}}" type="button" class="btn btn-success btn-sm float-end">Maak wedstrijd aan</a>
                <h5>Overzicht van wedstrijden</h5>
            </div>
            <div class="card-body p-0">
                <table id="fixturesTable" class="table table-striped table-light pb-0 mb-0">
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
                        <th scope="col">Date & Time</th>
                        <th scope="col">Location</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fixtures as $fixture)
                        <tr>
                            <td>{{$fixture->id}}</td>
                            <td>{{$fixture->type}}</td>
                            <td>{{$fixture->style}}</td>
                            <td>{{$fixture->length}}</td>
                            <td>{{$fixture->winner}}</td>
                            <td>{{$fixture->player1->name ?? "Player not found"}}</td>
                            <td>{{$fixture->player2->name ?? "Player not found"}}</td>
                            <td>{{$fixture->start_score}}</td>
                            <td>{{$fixture->date_time}}</td>
                            <td>{{$fixture->location}}</td>

                            <td>
                                <div class="btn-group">
                                    <a type="button" href="{{route('fixtures.show', $fixture->id)}}"
                                       class="me-2 rounded btn btn-sm btn-outline-secondary bi-eye-fill">
                                        open wedstrijd
                                    </a>

{{--                                    <a type="button" href="{{route('statistics.show', $fixture)}}"--}}
{{--                                       class="me-2 rounded btn btn-sm btn-outline-secondary bi-bar-chart-line">--}}
{{--                                        statistic--}}
{{--                                    </a>--}}


                                    <form method="POST" action="{{route('fixtures.destroy', $fixture)}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm ">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
