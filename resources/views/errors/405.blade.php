@extends('layouts.app3')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <img class="img-fluid" src="{{asset('logo_eccocolab.png')}}" alt="" width="300" height="50.54">
                    <h3 class="text-muted mt-4">Você tentou acessar através de um método do protocolo HTTP não permitido.</h3>
                    <a class="btn btn-dark btn-lg mt-4" href="{{url('/')}}">Volte ao Início</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        window.addEventListener('load', function() {

        });
    </script>
@stop
