@extends('layouts.app')

@section('content')

    @include('layouts.searchbar.search')

    <div class="mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <a href="{{route('players.create')}}" type="button" class="btn btn-success btn-sm float-end">Voeg nieuwe
                    speler toe</a>
                <h5>Overzicht van spelers</h5>
            </div>

            <div class="card-body">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($players as $player)
                        <div id="playerCard" class="col">
                            <div class="card shadow-sm">
                                @if(!is_null($player->image))
                                    <img class="card-img-top" style="max-height: 200px;" alt="Card image cap"
                                         src="{{url($player->image)}}">
                                @else
                                    <img class="card-img-top" style="max-height: 200px;" alt="Card image cap"
                                         src="https://picsum.photos/id/237/500/300.jpg">
                                @endif

                                <div class="card-body" style="{{ $player->winrate > 0.95 ? "background-color: gold;" : ($player->winrate < 0.05 && $player->winrate > 0 ? "background-color: black" : '') }}">
                                    <p class="card-title" style="color: {{ $player->winrate < 0.05 && $player->winrate > 0 ? 'white' : 'black' }}">{{ $player->name }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a type="button" href="{{route('players.edit', $player)}}"
                                               class="me-2 rounded btn btn-sm btn-outline-secondary">
                                                Bewerk Speler
                                            </a>

                                            <form method="post" action="{{route('players.destroy', $player)}}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Verwijder
                                                </button>
                                            </form>
                                        </div>
                                        <small class="text-muted" style="color: {{ $player->winrate >= 0.5 ? "green" : "red" }} !important">{{ sprintf('%s%%', $player->winrate * 100) }}</small>
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
