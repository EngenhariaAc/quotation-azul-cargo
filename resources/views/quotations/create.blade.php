@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Início</a></li>
                    <li class="breadcrumb-item" aria-current="page">Realizar Cotação</li>
                </ol>
            </nav>

            <div class="card shadow-sm">
                <h4 class="card-header text-center">{{ __('Realizar Cotação') }}</h4>

                <form id="submit_form" method="POST" action="{{route('quotations.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="origin_zip_code" class="col-md-3 col-form-label text-md-right">{{ __('CEP Origem') }}</label>

                            <div class="col-md-9">
                                <input id="origin_zip_code" type="text" class="form-control @error('origin_zip_code') is-invalid @enderror" name="origin_zip_code" value="{{ old('origin_zip_code') }}" placeholder="Digite o CEP Origem..." autocomplete="origin_zip_code" maxlength="20" autofocus>

                                @error('origin_zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="destination_zip_code" class="col-md-3 col-form-label text-md-right">{{ __('CEP Destino') }}</label>

                            <div class="col-md-9">
                                <input id="destination_zip_code" type="text" class="form-control @error('destination_zip_code') is-invalid @enderror" name="destination_zip_code" value="{{ old('destination_zip_code') }}" placeholder="Digite o CEP Destino..." autocomplete="destination_zip_code" maxlength="20" autofocus>

                                @error('destination_zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="real_weight" class="col-md-3 col-form-label text-md-right">{{ __('Peso Real') }}</label>

                            <div class="col-md-9">
                                <input id="real_weight" type="text" class="form-control @error('real_weight') is-invalid @enderror" name="real_weight" value="{{ old('real_weight') }}" placeholder="Digite o Peso Real..." autocomplete="real_weight" maxlength="20" autofocus>

                                @error('real_weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity_volume" class="col-md-3 col-form-label text-md-right">{{ __('Qtd. Volume(s) Total') }}</label>

                            <div class="col-md-9">
                                <input id="quantity_volume" type="text" class="form-control @error('quantity_volume') is-invalid @enderror" name="quantity_volume" value="{{ old('quantity_volume') }}" placeholder="Digite a Quantidade de Volume(s) Total..." autocomplete="quantity_volume" maxlength="20" autofocus>

                                @error('quantity_volume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_value" class="col-md-3 col-form-label text-md-right">{{ __('Valor Total') }}</label>

                            <div class="col-md-9">
                                <input id="total_value" type="text" class="form-control @error('total_value') is-invalid @enderror" name="total_value" value="{{ old('total_value') }}" placeholder="Digite o Valor Total..." autocomplete="name" maxlength="20" autofocus>

                                @error('total_value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input id="global_volume_quantity" type="number" name="global_volume_quantity" value="" hidden>

                        <div class="row">
                            <div class="col text-center">
                                <h3>Volumes</h3>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-active">
                                            <tr>
                                                <th>Qtd. Volume</th>
                                                <th>Peso</th>
                                                <th>Altura</th>
                                                <th>Comprimento</th>
                                                <th>Largura</th>
                                                <th><button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" data-placement="top" title="Adicionar"><i class="fas fa-plus"></i></button></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table_body"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Novo Volume</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="item_quantity_volume" class="col-md-3 col-form-label text-md-right">{{ __('Qtd. Volume') }}</label>

                                            <div class="col-md-9">
                                                <input id="item_quantity_volume" type="text" class="form-control @error('item_quantity_volume') is-invalid @enderror" name="item_quantity_volume" value="{{ old('item_quantity_volume') }}" placeholder="Digite a Quantidade de Volume..." autocomplete="item_quantity_volume" maxlength="20" autofocus>

                                                @error('item_quantity_volume')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="weight" class="col-md-3 col-form-label text-md-right">{{ __('Peso') }}</label>

                                            <div class="col-md-9">
                                                <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" placeholder="Digite o Peso..." autocomplete="weight" maxlength="20" autofocus>

                                                @error('weight')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="height" class="col-md-3 col-form-label text-md-right">{{ __('Altura') }}</label>

                                            <div class="col-md-9">
                                                <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" placeholder="Digite o Comprimento..." autocomplete="height" maxlength="20" autofocus>

                                                @error('height')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="length" class="col-md-3 col-form-label text-md-right">{{ __('Comprimento') }}</label>

                                            <div class="col-md-9">
                                                <input id="length" type="text" class="form-control @error('length') is-invalid @enderror" name="length" value="{{ old('length') }}" placeholder="Digite o Comprimento..." autocomplete="length" maxlength="20" autofocus>

                                                @error('length')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="width" class="col-md-3 col-form-label text-md-right">{{ __('Largura') }}</label>

                                            <div class="col-md-9">
                                                <input id="width" type="text" class="form-control @error('width') is-invalid @enderror" name="width" value="{{ old('width') }}" placeholder="Digite o Largura..." autocomplete="width" maxlength="20" autofocus>

                                                @error('width')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="back_modal" type="button" class="btn btn-dark" data-dismiss="modal" data-toggle="tooltip" data-placement="top" title="Voltar">Voltar</button>
                                        <button id="add_modal" type="button" class="btn btn-dark" data-dismiss="modal" data-toggle="tooltip" data-placement="top" title="Adicionar">Adicionar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row align-items-center justify-content-center mb-0">
                            <a class="btn btn-dark" href="{{route('home')}}" data-toggle="tooltip" data-placement="top" title="Voltar">
                                {{ __('Voltar') }}
                            </a>
                            <button id="submit_button" type="button" class="btn btn-dark ml-1" data-toggle="tooltip" data-placement="top" title="Registrar">
                                {{ __('Calcular') }}
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
            var global_volume = 1; // Global variable to sequence of volumes
            $('[data-toggle="tooltip"]').tooltip();
            $('#origin_zip_code').mask('00000-000');
            $('#destination_zip_code').mask('00000-000');
            $('#real_weight').mask('#0.00', {reverse: true});
            $('#quantity_volume').mask('#0', {reverse: true});
            $('#total_value').mask('#0.00', {reverse: true});
            $('#item_quantity_volume').mask('#0', {reverse: true});
            $('#weight').mask('#0.00', {reverse: true});
            $('#height').mask('#0.00', {reverse: true});
            $('#length').mask('#0.00', {reverse: true});
            $('#width').mask('#0.00', {reverse: true});
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')
            });
            $('#back_modal').on('click', function() {
                $('#item_quantity_volume').val('');
                $('#height').val('');
                $('#weight').val('');
                $('#length').val('');
                $('#width').val('');
            });
            $('#add_modal').on('click', function() {
                let current_volume = global_volume;
                inputs = '<div id="hidden_div'+ current_volume +'" class="d-none"><input id="item_quantity_volume' + current_volume + '" class="d-none" type="number" name="item_quantity_volume'+ current_volume +'" value="' + $('#item_quantity_volume').val() + '" hidden>' +
                            '<input id="weight' + current_volume + '" class="d-none" type="number" name="weight'+ current_volume +'" value="' + $('#weight').val() + '" hidden>' +
                            '<input id="height' + current_volume + '" class="d-none" type="number" name="height'+ current_volume +'" value="' + $('#height').val() + '" hidden>' +
                            '<input id="length' + current_volume + '" class="d-none" type="number" name="length'+ current_volume +'" value="' + $('#length').val() + '" hidden>' +
                            '<input id="width' + current_volume + '" class="d-none" type="number" name="width'+ current_volume +'" value="' + $('#width').val() + '" hidden></div>';
                $('#table_body').append('<tr id="tr_'+ current_volume +'"><td>' + $('#item_quantity_volume').val() + '</td><td>' + $('#weight').val() + '</td><td>' + $('#height').val() + '</td><td>' + $('#length').val() + '</td><td>' + $('#width').val() + '</td><td><button id="delete_volume'+ current_volume +'" class="btn btn-dark btn-sm" type="button"><i class="fas fa-trash"></i></button></td></tr>');
                $('#table_body').append(inputs);
                $('#delete_volume' + current_volume).on( 'click', function () {
                    $('#tr_' + current_volume).remove();
                    $('#hidden_div' + current_volume).remove();
                });
                $('#item_quantity_volume').val('');
                $('#height').val('');
                $('#weight').val('');
                $('#length').val('');
                $('#width').val('');
                global_volume ++;
            });
            $('#submit_button').on('click', function () {
                $('#global_volume_quantity').val(global_volume);
                $('#submit_form').submit();
            });
        });
    </script>
@stop
