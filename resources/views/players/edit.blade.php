@extends('layouts.app')

@section('content')

    <div class="mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm float-end me-2"> Terug</a>
                <h5>Bewerk speler "{{$player->name}}"</h5>
            </div>

            <div class="card-body">
                <form method="POST" enctype='multipart/form-data' action="{{route('players.update', $player)}}">
                    @method('PUT')

                    @include('players.forms.form')
                </form>
            </div>
        </div>
    </div>
@endsection
