@extends('layouts.painel')

@section('content')
    <div class="container">
        <h1 class="my-4">Gerenciamento de Tipos de Documentos</h1>

        <p>Olá, <strong>{{ Auth::user()->name }}</strong>. Seja bem-vindo ao painel de controle do sistema.</p>

        <div class="my-4">
            <a href="{{ route('docs.tipo.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Cadastrar Novo Tipo de Documento
            </a>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-hover table-striped table-bordered rounded table-custom">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th><i class="fas fa-file-alt"></i> Nome do Tipo de Documento</th>
                        <th class="text-center"><i class="fas fa-cog"></i> Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($docTipos as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nome }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('docs.tipo.edit', $item->id) }}" class="btn btn-sm btn-warning mx-1">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <button type="button" data-id="{{ $item->id }}" class="btn btn-sm btn-danger doc-tipo-delete mx-1">
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
            $('.doc-tipo-delete').click(function() {
                var docTipoId = $(this).data('id');

                Swal.fire({
                    title: 'Deseja realmente excluir este tipo de documento?',
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
                            url: "{{ route('docs.tipo.destroy', ':id') }}".replace(':id', docTipoId),
                            type: 'DELETE',
                            data: {
                                _token: $('input[name="_token"]').val()
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Excluído!',
                                    'O tipo de documento foi excluído com sucesso.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function() {
                                Swal.fire(
                                    'Erro!',
                                    'Ocorreu um erro ao excluir o tipo de documento. Tente novamente mais tarde.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
