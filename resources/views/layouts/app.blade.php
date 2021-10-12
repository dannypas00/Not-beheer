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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/icon.svg') }}">

    <!-- Style -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

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
