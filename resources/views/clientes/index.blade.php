@extends('layouts.painel')

@section('content')
    <div class="container">
        <h1 class="my-4">Gerenciamento de Clientes</h1>

        <p>Olá, <strong>{{ Auth::user()->name }}</strong>. Seja bem-vindo ao painel de controle do sistema.</p>

        <div class="my-4">
            <a href="{{ route('clientes.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Cadastrar Novo Cliente
            </a>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover table-striped table-bordered rounded table-custom">
                <thead class="thead-dark">
                    <tr>
                        <th><i class="fas fa-user"></i> Nome</th>
                        <th><i class="fas fa-id-card"></i> Documento</th>
                        <th><i class="fas fa-map-marker-alt"></i> Endereço</th>
                        <th><i class="fas fa-user-tie"></i> Responsável</th>
                        <th><i class="fas fa-phone"></i> Contato</th>
                        <th class="text-center"><i class="fas fa-cog"></i> Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $client)
                        <tr>
                            <td>{{ $client->nome }}</td>
                            <td>{{ $client->documento }}</td>
                            <td>{{ $client->endereco }}, {{ $client->numero }}</td>
                            <td>{{ $client->responsavel }}</td>
                            <td>{{ $client->telefone }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('clientes.edit', $client) }}" class="btn btn-sm btn-warning mx-1">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="{{ route('clientes.show', $client) }}" class="btn btn-sm btn-info mx-1">
                                        <i class="fas fa-edit"></i> Ver Detalhes
                                    </a>
                                    <a href="{{ route('clientes.docs', $client) }}" class="btn btn-sm btn-info mx-1">
                                        <i class="fas fa-edit"></i> Docs
                                    </a>
                                    <button type="button" data-id="{{ $client->id }}" class="btn btn-sm btn-danger client-delete mx-1">
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
            $('.client-delete').click(function() {
                var clientId = $(this).data('id');

                Swal.fire({
                    title: 'Deseja realmente excluir este cliente?',
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
                            url: "{{ route('clientes.destroy', ':id') }}".replace(':id', clientId),
                            type: 'DELETE',
                            data: {
                                _token: $('input[name="_token"]').val()
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Excluído!',
                                    'O cliente foi excluído com sucesso.',
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
