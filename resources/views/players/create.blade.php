@extends('layouts.app')

@section('content')

    <div class="mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <h5>Overzicht van spelers</h5>
            </div>

            <div class="card-body">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <form method="POST" action="{{route('players.store')}}">
                        @include('players.forms.form')
                    </form>
                    {{--                    {{ Form::model(null, ['route' => ['players.store'], 'method' => 'POST']) }}--}}
                    {{--                    <div class="card card-default md-4 shadow">--}}
                    {{--                        <div class="card-header">--}}
                    {{--                            dwjidjwaodjiado--}}
                    {{--                        </div>--}}

                    {{--                        <div class="card-body">--}}
                    {{--                            @include('players.forms.form')--}}
                    {{--                        </div>--}}

                    {{--                    </div>--}}
                    {{--                    {{ Form::close() }}--}}
                </div>
            </div>
        </div>
    </div>
@endsection
