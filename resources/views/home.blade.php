@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item active" aria-current="page">Início</li>
                </ol>
            </nav>
            <div class="card shadow-sm">
                <h4 class="card-header font-weight-bold">Funções</h4>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-dark btn-block m-1" href="{{route('quotations.create')}}" data-toggle="tooltip" data-placement="top" title="Realize cotações da Azul Cargo Express."><i class="fas fa-plane fa-lg mr-1"></i>{{ __('Cotação Azul Cargo Express') }}</a>

                    {{-- @can('viewAnyMyPaymentSchedules', \App\PaymentSchedule::class)
                        <a class="btn btn-dark btn-block m-1" href="{{route('mypaymentschedules.index')}}" data-toggle="tooltip" data-placement="top" title="Acesse seus agendamentos mais recentes em um período de um mês."><i class="fas fa-calendar-day fa-lg mr-1"></i>{{ __('Meus Agendamentos Recentes') }}</a>
                    @endcan --}}
                    {{-- @can('viewAnyMyPaymentSchedules', \App\PaymentSchedule::class)
                        <a class="btn btn-dark btn-block m-1" href="{{ route('allmypaymentschedules.index') }}" data-toggle="tooltip" data-placement="top" title="Acesse o histórico de todos os seus agendamentos."><i class="fas fa-book fa-lg mr-1"></i>{{ __('Meu Histórico de Agendamentos') }}</a>
                    @endcan --}}
                    {{-- @can('viewAny', \App\PeriodicSchedule::class)
                        <button class="btn btn-dark btn-block m-1" data-toggle="tooltip" data-placement="top" title="Acesse seus agendamentos periódicos."><i class="fas fa-clock fa-lg mr-1"></i>{{ __('Meus Agendamentos Periódicos') }}</button>
                    @endcan --}}
                    {{-- @can('viewAnyAutorizerPaymentSchedules', \App\PaymentSchedule::class)
                        <a class="btn btn-dark btn-block m-1" href="{{route('authorizerpaymentschedules.index')}}" data-toggle="tooltip" data-placement="top" title="Acesse os agendamentos únicos à autorizar ou autorizados por você."><i class="fas fa-calendar-plus fa-lg mr-1"></i>{{ __('Agendamentos Pendentes') }}</a>
                    @endcan --}}
                    {{-- @can('viewAnyAutorizerPaymentSchedules', \App\PaymentSchedule::class)
                        <a class="btn btn-dark btn-block m-1" href="{{route('allauthorizerpaymentschedules.index')}}" data-toggle="tooltip" data-placement="top" title="Acesse o histórico de todos os agendamentos autorizados por você no sistema."><i class="fas fa-book fa-lg mr-1"></i>{{ __('Histórico de Agendamentos Autorizados') }}</a>
                    @endcan --}}
                    {{-- @can('viewAnyManagementPaymentSchedules', \App\PaymentSchedule::class)
                        <a class="btn btn-dark btn-block m-1" href="{{route('managementpaymentschedules.index')}}" data-toggle="tooltip" data-placement="top" title="Gerencie os agendamentos únicos autorizados no sistema."><i class="fas fa-calendar-check fa-lg mr-1"></i>{{ __('Agendamentos Autorizados') }}</a>
                    @endcan --}}
                    {{-- @can('viewAnyManagementPaymentSchedules', \App\PaymentSchedule::class)
                        <a class="btn btn-dark btn-block m-1" href="{{route('allmanagementpaymentschedules.index')}}" data-toggle="tooltip" data-placement="top" title="Acesse o histórico de todos os agendamentos finalizados no sistema."><i class="fas fa-book fa-lg mr-1"></i>{{ __('Histórico de Agendamentos Finalizados') }}</a>
                    @endcan --}}
                    {{-- @can('viewAnyToPayPaymentSchedules', \App\PaymentSchedule::class)
                        <button class="btn btn-dark btn-block m-1" href="" data-toggle="tooltip" data-placement="top" title="Acesse os agendamentos únicos à pagar ou pagos por você."><i class="fas fa-money-check-alt fa-lg mr-1"></i>{{ __('Agendamentos À Pagar/Pagos') }}</button>
                    @endcan --}}
                    {{-- @can('viewAllPaymentSchedules', \App\PaymentSchedule::class)
                        <a class="btn btn-dark btn-block m-1" href="{{route('adminpaymentschedules.index')}}" data-toggle="tooltip" data-placement="top" title="Acesse o histórico de todos os agendamentos do sistema e veja seus detalhes."><i class="fas fa-calendar-alt fa-lg mr-1"></i>{{ __('Histórico de Agendamentos') }}</a>
                    @endcan --}}
                    {{-- @can('viewAny', \App\Sector::class)
                        <a class="btn btn-dark btn-block m-1" href="{{route('sectors.index')}}" data-toggle="tooltip" data-placement="top" title="Gerencie os setores de sua empresa no sistema."><i class="fas fa-layer-group fa-lg mr-1"></i>{{ __('Gerenciar Setores') }}</a>
                    @endcan --}}
                    {{-- @can('viewAny', \App\CostCenter::class)
                        <a class="btn btn-dark btn-block m-1" href="{{route('costcenters.index')}}" data-toggle="tooltip" data-placement="top" title="Gerencie os centros de custo de sua empresa no sistema."><i class="fas fa-donate fa-lg mr-1"></i>{{ __('Gerenciar Centros de Custo') }}</a>
                    @endcan --}}
                    {{-- @can('viewAny', \App\DocumentType::class)
                        <a class="btn btn-dark btn-block m-1" href="{{route('documenttypes.index')}}" data-toggle="tooltip" data-placement="top" title="Gerencie os tipos de documentos de sua empresa no sistema."><i class="fas fa-paste fa-lg mr-1"></i>{{ __('Gerenciar Tipos de Documento') }}</a>
                    @endcan --}}
                    {{-- @can('viewAny', \App\Profile::class)
                        <button class="btn btn-dark btn-block m-1" data-toggle="tooltip" data-placement="top" title="Gerencie e personalize os perfis do sistema."><i class="fas fa-id-card fa-lg mr-1"></i>{{ __('Gerenciar Perfis') }}</button>
                    @endcan --}}
                    {{-- @can('viewAny', \App\User::class)
                        <a class="btn btn-dark btn-block m-1" href="{{route('users.index')}}" data-toggle="tooltip" data-placement="top" title="Gerencie os usuários de sua empresa no sistema."><i class="fas fa-users fa-lg mr-1"></i>{{ __('Gerenciar Usuários') }}</a>
                    @endcan --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    window.addEventListener('load', function() {
        $(".alert").delay(4000).slideUp(300);

        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
