@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Início</a></li>
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('users.index')}}">Gerenciar Usuários</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Visualizar Usuário</li>
                </ol>
            </nav>
            <div class="card shadow-sm">
                <h4 class="card-header text-center">{{ __('Visualizar Usuário') }}</h4>

                <form>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right font-weight-bold">{{ __('Nome:') }}</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control-plaintext" value="{{$user->firstname.' '.$user->lastname}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-3 col-form-label text-md-right font-weight-bold">{{ __('Usuário:') }}</label>

                            <div class="col-md-9">
                                <input id="username" type="text" class="form-control-plaintext" value="{{$user->username}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sector" class="col-md-3 col-form-label text-md-right font-weight-bold">{{ __('Setor:') }}</label>

                            <div class="col-md-9">
                                <p id="sector" class="form-control-plaintext m-0">{{$user->sector->name}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpf" class="col-md-3 col-form-label text-md-right font-weight-bold">{{ __('CPF:') }}</label>

                            <div class="col-md-9">
                                <input id="cpf" type="text" class="form-control-plaintext" value="{{isset($user->cpf)?$user->cpf:'Não Informado'}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-3 col-form-label text-md-right font-weight-bold">{{ __('Telefone:') }}</label>

                            <div class="col-md-9">
                                <input id="phone" type="text" class="form-control-plaintext" value="{{isset($user->phone) ? $user->phone : 'Não Informado'}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right font-weight-bold">{{ __('E-Mail:') }}</label>

                            <div class="col-md-9">
                                <input id="email" type="text" class="form-control-plaintext" value="{{$user->email}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profiles" class="col-md-3 col-form-label text-md-right font-weight-bold">{{ __('Perfis:') }}</label>

                            <div class="col-md-9">
                                <ul>
                                    @foreach ($user->profiles as $profile)
                                        <li>{{$profile->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row align-items-center justify-content-center mb-0">
                            <a class="btn btn-dark" href="{{route('users.index')}}" data-toggle="tooltip"  data-placement="top" title="Voltar">
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
        });
    </script>
@stop
