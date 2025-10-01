@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Início</a></li>
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('quotations.create')}}">Realizar Cotação</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Visualizar Cotação</li>
                </ol>
            </nav>
            <div class="card shadow-sm">
                <h4 class="card-header text-center">{{ __('Visualizar Cotação') }}</h4>

                <form>
                    <div class="card-body">
                        <div class="container">
                            <div class="row mt-2">
                                <div class="col">
                                    <h5 class="text-center"><b>Dados Enviados</b></h5>
                                </div>
                            </div>
                        </div>

                        <div class="container border rounded">

                            <div class="row mt-2">
                                <div class="col bg-dark mx-0 my-1">
                                    <h6 class="text-white text-center mt-2"><b>Informações Gerais</b></h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 text-nowrap">
                                    <p>CEP Origem: {{$request_data['origin_zip_code']}}</p>
                                </div>
                                <div class="col-4 text-nowrap">
                                    <p>CEP Destino: {{$request_data['destination_zip_code']}}</p>
                                </div>
                                <div class="col-4 text-nowrap">
                                    <p>Peso Real: {{$request_data['real_weight']}}</p>
                                </div>
                                <div class="col-4 text-nowrap">
                                    <p>Qtd. Volume(s) Total: {{$request_data['quantity_volume']}}</p>
                                </div>
                                <div class="col-4 text-nowrap">
                                    <p>Valor Total: {{$request_data['total_value']}}</p>
                                </div>
                                <div class="col-4 text-nowrap">
                                    <p>Retirada: {{$request_data['pickup']}}</p>
                                </div>
                            </div>

                            @foreach ($request_data['volumes'] as $volume)
                                <div class="row">
                                    <div class="col bg-dark mx-0 my-1">
                                        <h6 class="text-white text-center mt-2"><b>Volume {{$loop->iteration}}</b></h6>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3 text-nowrap">
                                        <p>Qtd. Volume: {{$volume['item_quantity_volume']}}</p>
                                    </div>
                                    <div class="col-2 text-nowrap">
                                        <p>Peso: {{$volume['weight']}}</p>
                                    </div>
                                    <div class="col-2 text-nowrap">
                                        <p>Altura: {{$volume['height']}}</p>
                                    </div>
                                    <div class="col-3 text-nowrap">
                                        <p>Comprimento: {{$volume['lenght']}}</p>
                                    </div>
                                    <div class="col-2 text-nowrap">
                                        <p>Largura: {{$volume['width']}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="container">
                            <div class="row mt-2">
                                <div class="col">
                                    <h5 class="text-center"><b>Resultado Cotação</b></h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col m-0 p-0">
                                    <table class="table table-sm table-hover table-bordered">
                                        <thead class="text-white bg-dark">
                                            <tr>
                                                <th>Serviço</th>
                                                <th>Peso Taxado</th>
                                                <th>Prazo</th>
                                                <th>Frete</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($quotations as $quotation)
                                                <tr>
                                                    <td>{{$quotation['service_name']}}</td>
                                                    <td>{{$quotation['taxed_weight']}}</td>
                                                    <td>{{$quotation['deadline']}}</td>
                                                    <td>{{$quotation['freight']}}</td>
                                                    <td>{{$quotation['total']}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row align-items-center justify-content-center mb-0">
                            <a class="btn btn-dark" href="{{route('quotations.create')}}" data-toggle="tooltip"  data-placement="top" title="Voltar">
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
