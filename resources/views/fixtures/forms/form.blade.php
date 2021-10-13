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
                        <label for="player_1-select2" class="text-xl-left">
                            Speler 1
                        </label>
                        <select class="form-select d-block h-auto w-100" id="player_1-select2" name="player_1">

                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mt-3 mb-3">
                        <label for="player_2-select2" class="text-xl-left">
                            Speler 2
                        </label>
                        <select class="form-select d-block h-auto w-100" id="player_2-select2" name="player_2">
                            @foreach($players as $player)
                                <option value="{{$player->id}}">{{$player->name}}</option>
                            @endforeach
                        </select>
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
                            <label for="type" class="text-xl-left">
                                Speltype
                            </label>
                            <select id="type" class="form-select w-25" name="type">
                                <option value="first_to">First to</option>
                                <option value="best_of">Best of</option>
                            </select>
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
                        <label for="dateTime" class="text-xl-left">
                            Datum en Tijd
                        </label>
                        <input class="form-control d-block h-auto w-50" id="dateTime" name="date_time" type="text"
                               placeholder="..." data-id="date_time" readonly="readonly">
                    </div>
                    <div class="col-6">
                        <label for="location-select2" class="text-xl-left">
                            Locatie
                        </label>
                        <br>
                        <select id="location-select2" class="form-select d-block h-auto w-100" name="location"></select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 mb-3">
    <button class="btn btn-primary" type="submit">Maak aan</button>
</div>

<style>
    .select2-selection__arrow {
        display: none;
    }
</style>


@section('js')
    <script>
        $(document).ready(function () {
            const players = [
                    @foreach($players as $player)
                {
                    id: {{ $player->id }},
                    text: "{{ $player->name }}",
                    image: "{{ $player->image }}"
                },
                @endforeach
            ];
            console.log(players);
            var fp = flatpickr("#dateTime", {
                enableTime: true,
                time_24hr: true,
                locale: "nl"
            });
            $('#player_1-select2').select2({
                data: players,
                templateResult: templatePlayer,
                templateSelection: templatePlayer,
                selectionCssClass: ':all:'
            });
            $('#player_2-select2').select2({
                data: players,
                templateResult: templatePlayer,
                templateSelection: templatePlayer,
                selectionCssClass: ':all:'
            });
            $('#location-select2').select2({
                templateResult: templateCity,
                templateSelection: templateCity,
                placeholder: "empty",
                selectionCssClass: ':all:',
                ajax: {
                    transport: function (params, success, failure) {
                        console.log(params);
                        $.get({
                            url: "{{ route('cities.search', ['search' => 'xxx']) }}".replace('xxx', params.data.term),
                            success: success,
                            failure: failure
                        });
                    },
                    cache: true,
                    processResults: function (data) {
                        let results =
                            data.map(function (data) {
                                return {
                                    id: data.id,
                                    text: data.name
                                        + " (" + data.country.iso2 + ")",
                                    flag: convertToEmoji(data.country.emoji)
                                }
                            });
                        console.log(results);
                        return {
                            results: results
                        };
                    },
                },
                minimumInputLength: 3
            });

            function convertToEmoji(unicode) {
                unicode = unicode.split(' ').map(function (data) {
                    return data.replace('U+', '0x');
                });
                return String.fromCodePoint.apply(this, unicode);
            }

            function templateCity(city) {
                if (city.text == "empty") {
                    return $('<span>Selecteer een locatie</span>');
                }
                return $('<span>' + city.flag + ' ' + city.text + '</span>');
            }

            function templatePlayer (data) {
                return $('<img width=20 height=20 class="inline" src="' + data.image + '">  <span>' + data.text + '</span>');
            }
        });
    </script>
@endsection
