<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BitNet') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar border-0 navbar-expand-md navbar-light bg-white shadow-sm ">
            {{-- <div class="container"> --}}
                <ul class="nav navbar-nav justify-content-start">
                    <li class="nav-item">
                        <a class="navbar-brand pl-5" href="{{ url('/') }}">
                            <img src="{{ asset('img/logo.svg') }}" class="d-inline-block" width="35" height="35" alt="">
                        </a>
                    </li>
                </ul>




                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">

                    {{-- Boton de busqueda --}}
                    {{-- <ul class="nav navbar-nav w-100 justify-content-center ">
                        <li class="nav-item">
                            <form class="form-inline ">
                                <input class="form-control mr-sm-2 border-0 bg-light rounded-pill text-center"
                                    type="search" placeholder="Buscar" aria-label="Search">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                                    <path fill-rule="evenodd"
                                        d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                </svg>
                            </form>
                        </li>
                    </ul> --}}
                    <ul class="nav navbar-nav w-100 justify-content-center ">
                        <li class="nav-item">
                            <form class="form-inline ">
                                <div class="input-group">
                                    <input class="form-control py-2 pl-5 rounded-pill border-0 bg-light mr-1 pr-5 text-center" type="search" placeholder="Buscar">
                                    <span class="input-group-append">
                                        <button class="btn text-muted rounded-pill border-0 ml-n5" type="button">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                                            <path fill-rule="evenodd"
                                                d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                        </svg> 
                                        </button>
                                    </span>
                                </div>


                            </form>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav justify-content-end">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item pl-3">
                                    <a class="btn btn-primary rounded-pill px-3"
                                        href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                {{--
            </div> --}}
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
