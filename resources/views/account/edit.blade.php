@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Início</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                </ol>
            </nav>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card shadow-sm">
                <ul class="nav nav-tabs px-1 pt-1" id="nav-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#nav-profile" class="nav-link text-dark active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Perfil</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#nav-password" class="nav-link text-dark" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false">Senha</a>
                    </li>
                </ul>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form id="form-profile" method="POST" action="{{ route('account.change.info', $user) }}">
                            @csrf
                            @method('PUT')
                            <input type="text" name="tabId" value="nav-profile" hidden>
                            <div class="form-group row">
                                <label for="firstname" class="col-md-3 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-9">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname', $user->firstname) }}" placeholder="Digite o nome do usuário..." autocomplete="firstname" maxlength="20" autofocus>

                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-md-3 col-form-label text-md-right">{{ __('Sobrenome') }}</label>

                                <div class="col-md-9">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname', $user->lastname) }}" placeholder="Digite o sobrenome do usuário..." autocomplete="lastname" autofocus>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-3 col-form-label text-md-right">{{ __('Usuário') }}</label>

                                <div class="col-md-9">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $user->username) }}" placeholder="Digite o nome de usuário..." autocomplete="username">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sector_id" class="col-md-3 col-form-label text-md-right">{{ __('Setor') }}</label>

                                <div class="col-md-9">
                                    <select class="custom-select @error('sector_id'){{'is-invalid'}}@enderror" name="sector_id" id="sector_id">
                                        <option disabled selected>Selecione o setor...</option>
                                        @foreach ($sectors as $sector)
                                            <option value="{{$sector->id}}" {{old('sector_id', $user->sector->id) == $sector->id ? 'selected' : ''}}>{{$sector->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('sector_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cpf" class="col-md-3 col-form-label text-md-right">{{ __('CPF') }}</label>

                                <div class="col-md-9">
                                    <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf', $user->cpf) }}" placeholder="XXX.XXX.XXX-XX" autocomplete="cpf">

                                    @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-3 col-form-label text-md-right">{{ __('Telefone') }}</label>

                                <div class="col-md-9">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="(XX) XXXXX-XXXX" autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-9">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" placeholder="email@exemplo.com.br" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row align-items-center justify-content-center mb-0">
                                <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Salvar">
                                    {{ __('Salvar') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                        <form id="form-password" method="POST" action="{{ route('account.change.password', $user) }}">
                            @csrf
                            @method('PUT')
                            <input type="text" name="tabId" value="nav-password" hidden>
                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Nova Senha') }}</label>

                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Digite uma nova senha..." autocomplete="new-password" tabindex="1" autofocus>
                                        <div class="input-group-append">
                                            <button class="input-group-text" type="button" id="basic-addon1" onclick="changePasswordView();"><i id="password-icon" class="fas fa-eye"></i></button>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme a nova senha..." autocomplete="new-password" tabindex="2" autofocus>
                                        <div class="input-group-append">
                                            <button class="input-group-text" type="button" id="basic-addon2" onclick="changeConfirmPasswordView();"><i id="password-confirm-icon" class="fas fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center justify-content-center mb-0">
                                <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Salvar">
                                    {{ __('Salvar') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        window.addEventListener('load', function() {
            $('[data-toggle="tooltip"]').tooltip();

            $('#nav-tab a[href="#{{old('tabId')}}"]').tab('show');

            $(".alert").delay(4000).slideUp(300);

            $('#firstname').keyup(function() {
                $(this).val($(this).val().toLowerCase().replace(/(?:^|\s)\w/g, function(match) {
                    return match.toUpperCase();
                }));
            });
            $('#lastname').keyup(function() {
                $(this).val($(this).val().toLowerCase().replace(/(?:^|\s)\w/g, function(match) {
                    return match.toUpperCase();
                }));
            });
            $('#username').keyup(function() {
                $(this).val($(this).val().toLowerCase());
                $(this).val($(this).val().replaceAll(' ', ''));
            });
            $('#cpf').mask('000.000.000-00', {reverse: true});
            $('#phone').mask('(00) 00000-0000');
            $('#email').keyup(function() {
                $(this).val($(this).val().toLowerCase());
                $(this).val($(this).val().replaceAll(' ', ''));
            });
        });

        function changePasswordView() {
            if ($('#password').attr('type') == 'password') {
                $('#password').attr('type', 'text');
                $('#password-icon').removeClass('fa-eye');
                $('#password-icon').addClass('fa-eye-slash');
            } else {
                $('#password').attr('type', 'password');
                $('#password-icon').removeClass('fa-eye-slash');
                $('#password-icon').addClass('fa-eye');
            }
        }

        function changeConfirmPasswordView() {
            if ($('#password-confirm').attr('type') == 'password') {
                $('#password-confirm').attr('type', 'text');
                $('#password-confirm-icon').removeClass('fa-eye');
                $('#password-confirm-icon').addClass('fa-eye-slash');
            } else {
                $('#password-confirm').attr('type', 'password');
                $('#password-confirm-icon').removeClass('fa-eye-slash');
                $('#password-confirm-icon').addClass('fa-eye');
            }
        }
    </script>
@stop
