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
                <table class="table table-striped table-light pb-0 mb-0">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        <th scope="col"></th>
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
                            <td>{{$fixture->player1->name}}</td>
                            <td>{{$fixture->player2->name}}</td>
                            <td>{{$fixture->start_score}}</td>
                            <td>{{$fixture->date}}</td>

                            <td>
                                <button type="button" class="btn btn-secondary btn-sm float-end">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                                <form method="post" action="{{route('fixtures.destroy', $fixture)}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="button" class="btn btn-danger btn-sm float-end me-2">
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
