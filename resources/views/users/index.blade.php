@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Início</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                </ol>
            </nav>

            <div class="card shadow-sm">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <h4 class="m-0">{{ __('Usuários') }}</h4>
                    <a class="btn btn-md btn-fill btn-dark float-right" href="{{route('users.create')}}" data-toggle="tooltip"  data-placement="top" title="Novo Usuário">Novo</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Usuário</th>
                                <th>Setor</th>
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->firstname.' '.$user->lastname}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->sector->name}}</td>
                                    <td>{{$user->cpf}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->trashed())
                                            {{'Desativado'}}
                                        @else
                                            {{'Ativado'}}
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a class="text-dark @cannot('view', $user){{'disabled'}}@endcannot" href="{{route('users.show', $user)}}" data-toggle="tooltip"  data-placement="top" title="Visualizar" role="button" @cannot('view', $user){{'aria-disabled="true"'}}@endcannot>
                                            <i class="fas fa-eye fa-lg"></i>
                                        </a>
                                        <a class="text-dark ml-1 @cannot('changePassword', $user){{'disabled'}}@endcannot" href="{{route('users.change', $user)}}" data-toggle="tooltip"  data-placement="top" title="Mudar Senha" role="button" @cannot('changePassword', $user){{'aria-disabled="true"'}}@endcannot>
                                            <i class="fas fa-key"></i>
                                        </a>
                                        <a class="text-dark ml-1 @cannot('update', $user){{'disabled'}}@endcannot" href="{{route('users.edit', $user)}}" data-toggle="tooltip"  data-placement="top" title="Editar" role="button" @cannot('update', $user){{'aria-disabled="true"'}}@endcannot>
                                            <i class="fas fa-edit fa-lg"></i>
                                        </a>
                                        @if ($user->trashed())
                                            <button class="btn btn-link text-dark p-0 ml-1" data-toggle="tooltip"  data-placement="top" title="Ativar" onclick="sweet({{$user->id}});" @cannot('restore', $user){{'disabled'}}@endcannot>
                                                <i class="fas fa-toggle-on fa-lg"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-link text-dark p-0 ml-1" data-toggle="tooltip"  data-placement="top" title="Desativar" onclick="sweet({{$user->id}});" @cannot('delete', $user){{'disabled'}}@endcannot>
                                                <i class="fas fa-toggle-off fa-lg"></i>
                                            </button>
                                        @endif
                                        <form id="form-delete{{$user->id}}" method="POST" action="{{$user->trashed() ? route('users.activate', $user->id) : route('users.destroy', $user)}}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>Nome</th>
                            <th>Usuário</th>
                            <th>Setor</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tfoot>
                    </table>
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

            $('#example').DataTable({
                "pagingType": "numbers",
                responsive: true,
                "columnDefs": [
                    {
                        "targets": -1,
                        "className": "text-center",
                        "width": "15%",
                    },
                    { "type": "html", "targets": -1 },
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: [1,-1] }
                ],
                "language": {
                    "info": "Mostrando _START_ até _END_ de _TOTAL_ registros",
                    "lengthMenu":     "Mostrar _MENU_ registros",
                    "search":         "Filtrar:",
                    "paginate": {
                        "first":      "Primeiro",
                        "last":       "Último",
                        "next":       "Próximo",
                        "previous":   "Anterior"
                    },
                    "emptyTable": "Sem dados disponíveis",
                },
            });
        });

        function sweet(id) {
            Swal.fire({
                title: 'Tem certeza que deseja fazer esta ação?',
                text: "Você poderá mudar o comportamento deste elemento no sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#343a40',
                confirmButtonText: 'Sim, pode fazer!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-delete' + id).submit();
                }
            });
        }
    </script>
@stop
