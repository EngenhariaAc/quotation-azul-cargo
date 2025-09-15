<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Acesso BI</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar sticky-top navbar-expand navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('logo_completa_horizontal_preto.png')}}" alt="" width="60" height="33.80">
                    </a>
                @else
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{asset('logo_completa_horizontal_preto.png')}}" alt="" width="60" height="33.80">
                    </a>
                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{ __('Início') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 mb-4">
            @yield('content')
        </main>

        <footer class="nav fixed-bottom nav-light bg-white border-top justify-content-end align-items-center p-1">
            <span class="nav-item text-muted mr-1">Desenvolvido por</span>
            <div class="nav-item p-0 m-0">
                <img src="{{asset('logo_eccocolab.png')}}" alt="" width="80" height="13.48">
            </div>
        </footer>
    </div>
    @yield('script')
</body>
</html>
