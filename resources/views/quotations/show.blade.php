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

                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Serviço</th>
                                        <th>Peso Taxado</th>
                                        <th>Prazo</th>
                                        <th>Frete</th>
                                        <th>Total</th>
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
