@extends('layouts.app')

@section('content')

    @include('layouts.searchbar.search')

    <div class="mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success btn-sm float-end">Voeg nieuwe speler toe</button>
                <h5>Overzicht van spelers</h5>
            </div>

            <div class="card-body">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($players as $player)
                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <p class="card-title">{{$player->name}}</p>
                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Deserunt eum exercitationem iste maxime optio recusandae sapiente sint
                                        voluptatem? Culpa, illum?</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
