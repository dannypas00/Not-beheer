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
                <table id="fixtures" class="table table-striped table-light pb-0 mb-0">
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
                            <td>{{$fixture->player1->name}}</td>
                            <td>{{$fixture->player2->name}}</td>
                            <td>{{$fixture->start_score}}</td>
                            <td>{{$fixture->date}}</td>

                            <td>
                                <button type="button" class="btn btn-secondary btn-sm ">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                                <form method="POST" action="{{route('fixtures.destroy', $fixture)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm ">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
