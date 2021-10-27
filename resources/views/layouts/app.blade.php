<?php

?>
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Beste Dart site ever">
    <meta name="author" content="Team 9">
    <title>Darts</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/icon.svg') }}">

    <!-- Style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <!-- date/time -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/nl.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"
            type="text/javascript"></script>

    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"
            integrity="sha256-9yRP/2EFlblE92vzCA10469Ctd0jT48HnmmMw5rJZrA=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    <script src="../../js/app.js"></script>
</head>
<body>

<main>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark min-vh-100">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="{{asset('assets/icon.svg')}}" class="img-fluid img-thumbnail border-0 bg-dark" width="36"
                 height="36" alt="...">
            <span class="fs-4 text-uppercase text-">Darts</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="../" class="nav-link text-white {{ (request()->is('players')) ? 'active' : '' }}"
                   aria-current="page">
                    <i class="bi bi-person-fill"></i>
                    Spelers
                </a>
            </li>
            <li>
                <a href="{{route('fixtures.index')}}" class="nav-link text-white
                            {{ (request()->is('fixtures')) ? 'active' : '' }}">
                    <i class="bi bi-calendar-week"></i>
                    Wedstrijden
                </a>
            </li>
            <li>
                <a href="../statistics" class="nav-link text-white
                            {{ (request()->is('statistics')) ? 'active' : '' }}">
                    <i class="bi bi-bar-chart-line"></i>
                    Statistieken
                </a>
            </li>
            <li>
                <a href="../export" class="nav-link text-white
                            {{ (request()->is('export')) ? 'active' : '' }}">
                    <i class="bi bi-hdd"></i>
                    Data import/export
                </a>
            </li>
        </ul>
        <hr>
        <span class="text-center text-uppercase">Copyright Team - 9</span>
    </div>

    <div class="container-fluid overflow-auto pt-4 bg-dark">
        @yield('content')
    </div>

</main>
</body>
</html>

@yield('js')

<script>
    $(document).ready(function () {
        @foreach($errors->all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
    });
</script>
