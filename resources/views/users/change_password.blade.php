@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Início</a></li>
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('users.index')}}">Gerenciar Usuários</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mudar Senha</li>
                </ol>
            </nav>
            <div class="card shadow-sm">
                <h4 class="card-header text-center">{{ __('Mudar Senha') }}</h4>

                <form method="POST" action="{{ route('users.update.password', $user) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
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

                        <div class="form-group row mb-0">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-9">
                                <div class="input-group mb-0">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme a nova senha..." autocomplete="new-password" tabindex="2" autofocus>
                                    <div class="input-group-append">
                                        <button class="input-group-text" type="button" id="basic-addon2" onclick="changeConfirmPasswordView();"><i id="password-confirm-icon" class="fas fa-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row align-items-center justify-content-center mb-0">
                            <button type="submit" class="btn btn-dark" data-toggle="tooltip"  data-placement="top" title="Registrar">
                                {{ __('Registrar') }}
                            </button>
                            <a class="btn btn-dark ml-1" href="{{route('users.index')}}" data-toggle="tooltip"  data-placement="top" title="Voltar">
                                {{ __('Voltar') }}
                            </a>
                            <button type="button" class="btn btn-dark ml-1" data-toggle="tooltip"  data-placement="top" title="Gerar Senha" onclick="generatePassword();">
                                {{ __('Gerar Senha') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        window.addEventListener('load', function() {
            $('[data-toggle="tooltip"]').tooltip();
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

        function generatePassword() {
            new_value = generateRandomPassword(8);
            $('#password').val(new_value);
            $('#password-confirm').val(new_value);
        }

        function generateRandomPassword(length) {
            var i = 0;
            var numkey = "";
            var randomNumber;

            while( i < length) {

                randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;

                if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
                if ((randomNumber >=58) && (randomNumber <=90)) { continue; }
                if ((randomNumber >=91) && (randomNumber <=122)) { continue; }
                if ((randomNumber >=123) && (randomNumber <=126)) { continue; }

                i++;
                numkey += String.fromCharCode(randomNumber);

            }

            return numkey;

        }
    </script>
@stop
