@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Início</a></li>
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('users.index')}}">Gerenciar Usuários</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Usuário</li>
                </ol>
            </nav>
            <div class="card shadow-sm">
                <h4 class="card-header text-center">{{ __('Editar Usuário') }}</h4>

                <form method="POST" action="{{ route('users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
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

                        <div class="form-group row">
                            <label for="profiles" class="col-md-3 col-form-label text-md-right">{{ __('Perfis') }}</label>

                            <div class="col-md-9">
                                <select class="custom-select select2 @error('users') is-invalid @enderror" name="profiles[]" id="profiles" multiple="multiple">
                                    @foreach ($profiles as $profile)
                                        <option value="{{$profile->id}}" {{ in_array($profile->id, old('profiles', $user->profiles->keyBy('id')->keys()->all())) ? 'selected' : '' }}>{{$profile->name}}</option>
                                    @endforeach
                                </select>
                                @error('profiles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row align-items-center justify-content-center mb-0">
                            <button type="submit" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Registrar">
                                {{ __('Registrar') }}
                            </button>
                            <a class="btn btn-dark ml-1" href="{{route('users.index')}}" data-toggle="tooltip" data-placement="top" title="Voltar">
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
            $('#profiles').select2({
                placeholder: '  Clique para selecionar os perfis...',
            });
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
