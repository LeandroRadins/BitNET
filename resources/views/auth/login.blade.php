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
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

    </style>
</head>

<body class="text-center">
    <form method="POST" class="form-signin" action="{{ route('login') }}">
        @csrf
        <img class="mb-4" src="{{ asset('img/logo.svg') }}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Inicie Sesion</h1>
        <label for="inputEmail" class="sr-only">Direccion de Correo Electronico</label>
        <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror"
            placeholder="Direccion de Correo Electronico" name="email" value="{{ old('email') }}" required
            autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" placeholder="Contraseña"
            class="form-control @error('password') is-invalid @enderror" name="password" required
            autocomplete="current-password">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Recordarme
            </label>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020 - POO2</p>
    </form>
</body>

</html>
