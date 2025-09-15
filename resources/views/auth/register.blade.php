@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <h4 class="card-header text-center">{{ __('Novo Registro') }}</h4>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Digite seu primeiro nome..." autocomplete="name" maxlength="20" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email@exemplo.com.br" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Digite sua senha..." autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua senha..." autocomplete="new-password">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row align-items-center justify-content-center">
                            <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Registrar">
                                {{ __('Registrar') }}
                            </button>
                            <a class="btn btn-dark ml-1" href="{{url('/')}}" data-toggle="tooltip" data-placement="top" title="Voltar">
                                {{ __('Voltar') }}
                            </a>
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
        })
    </script>
@stop
