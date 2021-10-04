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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-people" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.
                            167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.45
                            7.76 1.72l-.008.002a.274.2740 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3
                            3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5
                            3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5
                             13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4
                             13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0
                             0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg>
                    Spelers
                </a>
            </li>
            <li>
                <a href="{{ route('fixtures.index') }}" class="nav-link text-white {{ (request()->is('fixtures')) ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-calendar-week" viewBox="0 0 16 16">
                        <path
                            d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0
                            1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5
                            0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5
                            0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0
                            0 1-.5-.5v-1z"></path>
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2
                            2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1
                            1 0 0 0 1-1V4H1z"></path>
                    </svg>
                    Wedstrijden
                </a>
            </li>
            <li>
                <a href="../statistics" class="nav-link text-white {{ (request()->is('statistics')) ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                        <path
                            d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1
                            0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1
                            1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
                    </svg>
                    Statistieken
                </a>
            </li>
            <li>
                <a href="../export" class="nav-link text-white {{ (request()->is('export')) ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hdd"
                         viewBox="0 0 16 16">
                        <path d="M4.5 11a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zM3 10.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                        <path
                            d="M16 11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V9.51c0-.418.105-.
                            83.305-1.197l2.472-4.531A1.5 1.5 0 0 1 4.094 3h7.812a1.5 1.5
                            0 0 1 1.317.782l2.472 4.53c.2.368.305.78.305 1.198V11zM3.655
                            4.26 1.592 8.043C1.724 8.014 1.86 8 2 8h12c.14 0 .276.014.408.042L12.345
                            4.26a.5.5 0 0 0-.439-.26H4.094a.5.5 0 0 0-.44.26zM1 10v1a1 1 0 0 0 1
                            1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z"/>
                    </svg>
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
