@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <h4 class="card-header text-center">{{ __('Agendamento Online') }}</h4>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-9">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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
                        <div class="row justify-content-center align-items-center mb-0">
                            <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Acessar">
                                {{ __('Acessar') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn text-dark btn-link" href="{{ route('password.request') }}" data-toggle="tooltip" data-placement="top" title="Esqueceu sua senha?">
                                    {{ __('Esqueceu sua senha?') }}
                                </a>
                            @endif
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
            $('#username').keyup(function() {
                $(this).val($(this).val().toLowerCase());
                $(this).val($(this).val().replaceAll(' ', ''));
            });
        })
    </script>
@stop
