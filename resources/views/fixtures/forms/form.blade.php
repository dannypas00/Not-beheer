<?php

?>
@csrf

<div class="mt-3 mb-3">
    <div class="card">
        <div class="card-header">
            <h1>Wedstrijd instellingen</h1>
            {{--                        Spelers--}}
            <div class="row">
                <div class="col-6">
                    <div class="mt-3 mb-3">
                        <h5>Speler 1</h5>
                        <label>
                            <select class="form-select js-example-basic-single" name="player_1">
                                @foreach($players as $player)
                                    <option value="{{$player->id}}">{{$player->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-3 mb-3">
                        <h5>Speler 2</h5>
                        <label>
                            <select class="form-select js-example-basic-single" name="player_2">
                                @foreach($players as $player)
                                    <option value="{{$player->id}}">{{$player->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--                        Speltypes--}}
    <div class="mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <div class="mt-3 mb-3">
                            <h5>Selecteer speltype</h5>
                            <label>
                                <select class="form-select" name="type">
                                    <option value="first_to">First to</option>
                                    <option value="best_of">Best of</option>
                                    id
                                </select>
                            </label>
                        </div>
                        <div class="mt-3 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="style"
                                       id="leg" value="leg" checked>
                                <label class="form-check-label" for="leg">
                                    Legs
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="style"
                                       id="set" value="set">
                                <label class="form-check-label" for="set">
                                    Sets
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        {{--            Sets/legs & Beginscore--}}
                        <div class="mt-3 mb-3">
                            <h5>Aantal sets/legs</h5>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"></div>
                                <input min="1" name="length" type="number" style="max-width: 80px" class="form-control"
                                       aria-label="Default" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="mt-3 mb-3">
                            <h5>Beginscore</h5>
                            <label>
                                <select class="form-select" name="start_score">
                                    <option value="301">301</option>
                                    <option value="501">501</option>
                                    <option value="701">701</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 mb-3">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <label>
                            <h5>
                                Datum en Tijd
                            </h5>
                            <input class="form-control" id="dateTime" name="date_time" type="text"
                                   placeholder="..." data-id="date_time" readonly="readonly">
                        </label>
                    </div>
                    <div class="col-6">
                        <label>
                            <h5>
                                Land en Stad
                            </h5>
                            <input class="form-control" id="location" name="location" type="text" placeholder="test">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 mb-3">
    <button class="btn btn-primary" type="submit">Maak aan</button>
</div>


@section('js')
    <script>
        $(document).ready(function () {
            var fp = flatpickr("#dateTime", {
                enableTime: true,
                time_24hr: true,
                locale: "nl"
            });
            $('.js-example-basic-single').select2()
        });
    </script>
@endsection
