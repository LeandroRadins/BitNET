<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BitNet')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white">
    <div id="app">
        <nav
            class="navbar border-top-0 border-left-0 border-right-0 navbar-expand-md navbar-light bg-white border-bottom ">
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

                    <ul class="nav navbar-nav w-100 justify-content-center ">
                        <li class="nav-item">
                            <form class="form-inline ">
                                <div class="input-group">
                                    <input
                                        class="form-control py-2 pl-5 rounded-pill border-0 bg-light mr-1 pr-5 text-center"
                                        type="search" placeholder="Buscar">
                                    <span class="input-group-append">
                                        <button class="btn text-muted rounded-pill border-0 ml-n5" type="button">
                                            <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-search"
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
                                <a class="btn btn-primary rounded-pill px-3" href="{{ route('login') }}">Login</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item pl-3">
                                    <a class=""
                                        href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link h5 p-0 my-auto" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
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
            <div class="d-flex">
                <div class="col-3">
                    <div class="px-5 py-4">
                        <ul class="nav ">
                            <li class="nav-item  bg-lightpurple rounded-pill text-primary h5 w-75 ">
                            <a class="nav-link text-decoration-none font-weight-bolder align-items-baseline" href="{{route("temas.index")}}">
                                    
                                      <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-tags-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M3 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 7.586 1H3zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                        <path d="M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                      </svg>
                                      &nbsp;&nbsp;&nbsp;Temas</a>
                            </li>
                            <li class="nav-item  rounded-pill text-primary h5 w-75 ">
                                <a class="nav-link text-decoration-none font-weight-bolder " href="#">
                                    <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-question-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
                                      </svg>
                                      &nbsp;&nbsp;&nbsp;Mis Preguntas</a>
                            </li>
                            <li class="nav-item  rounded-pill text-primary h5 w-75 ">
                                <a class="nav-link text-decoration-none font-weight-bolder " href="#">
                                    <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-chat-square-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                                      </svg>
                                      &nbsp;&nbsp;&nbsp;Mis Respuestas</a>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="col-9 ">
                    <div class="container-fluid py-4 px-0">
                        @yield('content')

                    </div>


                </div>
            </div>

        </main>
    </div>
</body>

</html>
