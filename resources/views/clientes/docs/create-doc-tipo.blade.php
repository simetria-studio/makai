@extends('layouts.painel')

@section('content')
    <div class="container">
        <h1 class="my-4">Cadastrar Tipo de Documento</h1>

        <div class="card shadow-sm rounded">
            <div class="card-body">
                <form id="docTipoForm">
                    @csrf

                    <div class="form-group">
                        <label for="nome">Nome do Tipo de Documento:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do tipo de documento" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar Tipo de Documento</button>
                </form>
            </div>
        </div>

        <!-- Exibir lista de tipos de documentos cadastrados -->
        <div class="mt-4">
            <h4>Tipos de Documentos Cadastrados</h4>
            <ul class="list-group" id="docTipoList">
                <!-- A lista será preenchida via AJAX -->
            </ul>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            // Função para carregar a lista de tipos de documentos ao carregar a página
          

            // Submissão do formulário via AJAX
            $('#docTipoForm').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('docs.tipo.store') }}", // Rota para salvar o tipo de documento
                    type: 'POST',
                    data: $(this).serialize(), // Serializa os dados do formulário
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Tipo de documento cadastrado com sucesso!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#docTipoForm')[0].reset(); // Reseta o formulário
                       //redireciona para a rota de listagem de tipos de documentos
                        window.location.href = "{{ route('doc_tipos.index') }}";
                    },
                    error: function (xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro!',
                            text: 'Ocorreu um erro ao cadastrar o tipo de documento. Por favor, tente novamente.',
                            confirmButtonText: 'Ok'
                        });
                    }
                });
            });
        });
    </script>
@endsection
