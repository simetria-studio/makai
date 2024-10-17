@extends('layouts.painel')

@section('content')
    <div class="container">
        <h1 class="my-4">Gerenciamento de Usuários</h1>

        <p>Olá, <strong>{{ Auth::user()->name }}</strong>. Seja bem-vindo ao painel de controle do sistema.</p>

        <div class="my-4">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Cadastrar Novo Usuário
            </a>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover table-striped table-bordered rounded table-custom">
                <thead class="thead-dark">
                    <tr>
                        <th><i class="fas fa-user"></i> Nome</th>
                        <th><i class="fas fa-envelope"></i> E-mail</th>
                        <th><i class="fas fa-user-shield"></i> Permissão</th>
                        <th class="text-center"><i class="fas fa-cog"></i> Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge badge-primary">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning mx-1">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <button type="button" data-id="{{ $user->id }}" class="btn btn-sm btn-danger user-delete mx-1">
                                        <i class="fas fa-trash"></i> Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.user-delete').click(function() {
                var user = $(this).data('user');

                Swal.fire({
                    title: 'Deseja realmente excluir este usuário?',
                    text: "Esta ação não poderá ser desfeita!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('users.destroy', $user) }}",
                            type: 'DELETE',
                            data: {
                                _token: $('input[name="_token"]').val()
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Excluído!',
                                    'O usuário foi excluído com sucesso.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection


