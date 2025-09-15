<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Agendamento Online</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/date-euro.js') }}"></script>
    <script src="{{ asset('js/numeric-comma.js') }}"></script>

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
                    <a class="navbar-brand align-bottom" href="{{ url('/') }}">
                        <img src="{{asset('logo_completa_horizontal_preto.png')}}" alt="" width="60" height="33.80">
                    </a>
                @else
                    <a class="navbar-brand align-bottom" href="{{ route('home') }}">
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
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Acessar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registre-se') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->profiles->count() <= 1)
                                <li class="nav-item d-none d-sm-block">
                                    <a class="nav-link text-uppercase disabled" href="#" tabindex="-1" aria-disabled="true">{{Auth::user()->profile->name}}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown d-none d-sm-block">
                                    <a id="profile-dropdown" class="nav-link dropdown-toggle text-uppercase mr-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->profile->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profile-dropdown">
                                        <h5 class="dropdown-header text-uppercase">
                                            {{ __('Perfis') }}
                                        </h5>
                                        <div class="dropdown-divider"></div>
                                        @foreach (Auth::user()->profiles as $profile)
                                            <a class="dropdown-item" href="{{route('changeprofile', [ 'profile' => $profile])}}">
                                                @if(Auth::user()->profile->id == $profile->id)<i class="fas fa-check fa-lg mr-1"></i>@endif{{ $profile->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="btn btn-dark dropdown-toggle text-uppercase" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <h5 class="dropdown-header text-uppercase">
                                        {{ __('Funções') }}
                                    </h5>
                                    <div class="dropdown-divider"></div>

                                    @can('viewAnyMyPaymentSchedules', \App\PaymentSchedule::class)
                                        <a class="dropdown-item" href="{{route('mypaymentschedules.index')}}">
                                            <i class="fas fa-calendar-day fa-lg mr-1"></i>{{ __('Meus Agendamentos Recentes') }}
                                        </a>
                                    @endcan

                                    @can('viewAnyMyPaymentSchedules', \App\PaymentSchedule::class)
                                        <a class="dropdown-item" href="{{ route('allmypaymentschedules.index') }}">
                                            <i class="fas fa-book fa-lg mr-1"></i>{{ __('Meu Histórico de Agendamentos') }}
                                        </a>
                                    @endcan

                                    {{-- @can('viewAny', \App\PeriodicSchedule::class)
                                        <a class="dropdown-item" href="">
                                            <i class="fas fa-clock fa-lg mr-1"></i>{{ __('Meus Agendamentos Periódicos') }}
                                        </a>
                                    @endcan --}}

                                    @can('viewAnyAutorizerPaymentSchedules', \App\PaymentSchedule::class)
                                        <a class="dropdown-item" href="{{route('authorizerpaymentschedules.index')}}">
                                            <i class="fas fa-calendar-plus fa-lg mr-1"></i>{{ __('Agendamentos Pendentes/Autorizados') }}
                                        </a>
                                    @endcan

                                    @can('viewAnyManagementPaymentSchedules', \App\PaymentSchedule::class)
                                        <a class="dropdown-item" href="{{route('managementpaymentschedules.index')}}">
                                            <i class="fas fa-calendar-check fa-lg mr-1"></i>{{ __('Agendamentos Autorizados/Finalizados') }}
                                        </a>
                                    @endcan

                                    {{-- @can('viewAnyToPayPaymentSchedules', \App\PaymentSchedule::class)
                                        <a class="dropdown-item" href="">
                                            <i class="fas fa-money-check-alt fa-lg mr-1"></i>{{ __('Agendamentos À Pagar/Pagos') }}
                                        </a>
                                    @endcan --}}

                                    @can('viewAllPaymentSchedules', \App\PaymentSchedule::class)
                                        <a class="dropdown-item" href="{{route('adminpaymentschedules.index')}}">
                                            <i class="fas fa-calendar-alt fa-lg mr-1"></i>{{ __('Histórico de Agendamentos') }}
                                        </a>
                                    @endcan

                                    @can('viewAny', \App\Sector::class)
                                        <a class="dropdown-item" href="{{route('sectors.index')}}">
                                            <i class="fas fa-layer-group fa-lg mr-1"></i>{{ __('Gerenciar Setores') }}
                                        </a>
                                    @endcan

                                    @can('viewAny', \App\CostCenter::class)
                                        <a class="dropdown-item" href="{{route('costcenters.index')}}">
                                            <i class="fas fa-donate fa-lg mr-1"></i>{{ __('Gerenciar Centros de Custo') }}
                                        </a>
                                    @endcan

                                    @can('viewAny', \App\DocumentType::class)
                                        <a class="dropdown-item" href="{{route('documenttypes.index')}}">
                                            <i class="fas fa-paste fa-lg mr-1"></i>{{ __('Gerenciar Tipos de Documento') }}
                                        </a>
                                    @endcan

                                    {{-- @can('viewAny', \App\Profile::class)
                                        <a class="dropdown-item" href="">
                                            <i class="fas fa-id-card fa-lg mr-1"></i>{{ __('Gerenciar Perfis') }}
                                        </a>
                                    @endcan --}}

                                    @can('viewAny', \App\User::class)
                                        <a class="dropdown-item" href="{{route('users.index')}}">
                                            <i class="fas fa-users fa-lg mr-1"></i>{{ __('Gerenciar Usuários') }}
                                        </a>
                                    @endcan

                                    <div class="dropdown-divider d-block d-sm-none"></div>
                                    <h5 class="dropdown-header text-uppercase d-block d-sm-none mt-1">
                                        {{ __('Perfis') }}
                                    </h5>
                                    <div class="dropdown-divider d-block d-sm-none"></div>

                                    @foreach (\App\Profile::all() as $profile)
                                        <a class="dropdown-item d-block d-sm-none" href="{{route('changeprofile', [ 'profile' => $profile])}}">
                                            @if(Auth::user()->profile->id == $profile->id)<i class="fas fa-check fa-lg mr-1"></i>@endif{{ $profile->name }}
                                        </a>
                                    @endforeach

                                    <div class="dropdown-divider"></div>
                                    <h5 class="dropdown-header text-uppercase mt-1">
                                        {{ __('Usuário') }}
                                    </h5>
                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{route('account.edit', Auth::user())}}">
                                        <i class="fas fa-user fa-lg mr-1"></i>{{ __('Minha Conta') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-power-off fa-lg mr-1"></i>{{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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
