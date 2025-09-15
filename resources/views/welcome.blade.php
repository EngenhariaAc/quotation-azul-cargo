<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Agendamento Online</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                position: absolute;
                text-align: center;
                padding-top: 50px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Acessar</a>
                        @else
                            <a href="{{ route('login') }}">Acessar</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Registre-se</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <div class="content h-75 w-75 justify-content-center align-items-center m-0">
                    <div class="row">
                        <div class="d-sm-block d-none col-6">
                            <img class="img-fluid" src="{{asset('logo_completa_vertical_preto.png')}}" alt="" width="300" height="164.66">

                            <div class="links pt-5">
                                <a class="text-dark" href="https://www.facebook.com/aguadecocobr/"><i class="fab fa-facebook-square fa-3x"></i></a>
                                <a class="text-dark" href="https://www.instagram.com/aguadecoco/?hl=pt-br"><i class="fab fa-instagram-square fa-3x"></i></a>
                                <a class="text-dark" href="https://www.linkedin.com/company/agua-de-coco/"><i class="fab fa-linkedin fa-3x"></i></a>
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="row d-sm-none d-block justify-content-center mb-3 mt-0">
                                <img class="img-fluid" src="{{asset('logo_completa_vertical_preto.png')}}" alt="" width="200" height="109.77">
                            </div>
                            <div class="card shadow bg-light">
                                <div class="card-header">
                                    <h3 class="card-title text-center align-center m-0">Agendamento Online</h3>
                                </div>
                                @guest
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                                <div class="col-md-8">
                                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                                                <div class="col-md-8">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="form-check">
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                            <label class="custom-control-label" for="remember">
                                                                {{ __('Lembrar-me') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <div class="form-group row mb-0">
                                                <div class="col-md-12 p-1">
                                                    <button type="submit" class="btn btn-dark">
                                                        {{ __('Acessar') }}
                                                    </button>
                                                    <a href="{{ route('register') }}" class="btn btn-dark">
                                                        {{ __('Registrar-se') }}
                                                    </a>
                                                    @if (Route::has('password.request'))
                                                        <a class="btn text-dark btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Esqueceu sua senha?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <div class="card-body">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col">
                                                <p>Bem vindo, {{Auth::user()->name}}.</p>
                                                <p class="mb-0">Você já está logado.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col">
                                                <a class="btn btn-dark" href="{{route('home')}}">Acessar</a>
                                                <a class="btn text-dark btn-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('Não é você?') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.addEventListener('load', function() {
                $('#username').keyup(function() {
                    $(this).val($(this).val().toLowerCase());
                    $(this).val($(this).val().replaceAll(' ', ''));
                });
            })
        </script>
    </body>
</html>
