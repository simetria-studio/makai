@extends('layouts.painel')

@section('content')
    <div class="container">
        <h1 class="my-4">Editar Cliente</h1>

        <div class="card shadow-sm rounded">
            <div class="card-body">
                <form id="clienteForm">
                    @csrf
                  

                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $cliente->nome }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $cliente->email }}">
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $cliente->telefone }}">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cep">CEP:</label>
                            <input type="text" class="form-control" id="cep" name="cep" value="{{ $cliente->cep }}">
                        </div>

                        <div class="form-group col-md-8">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $cliente->endereco }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="numero">Número:</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="{{ $cliente->numero }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="complemento">Complemento:</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" value="{{ $cliente->complemento }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $cliente->bairro }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $cliente->cidade }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="estado">Estado:</label>
                            <input type="text" class="form-control" id="estado" name="estado" value="{{ $cliente->estado }}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="pais">País:</label>
                            <input type="text" class="form-control" id="pais" name="pais" value="{{ $cliente->pais }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="responsavel">Responsável:</label>
                        <input type="text" class="form-control" id="responsavel" name="responsavel" value="{{ $cliente->responsavel }}">
                    </div>

                    <div class="form-group">
                        <label for="documento">Documento:</label>
                        <input type="text" class="form-control" id="documento" name="documento" value="{{ $cliente->documento }}">
                    </div>

                    <div class="form-group">
                        <label for="observacao">Observação:</label>
                        <textarea class="form-control" id="observacao" name="observacao" rows="3">{{ $cliente->observacao }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1" {{ $cliente->status == 1 ? 'selected' : '' }}>Ativo</option>
                            <option value="0" {{ $cliente->status == 0 ? 'selected' : '' }}>Inativo</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Atualizar Cliente</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#clienteForm').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('clientes.update', $cliente) }}", // URL de atualização
                    type: "POST", // Método POST para envio de dados
                    data: $(this).serialize(), // Serializa os dados do formulário
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Cliente atualizado com sucesso!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = "{{ route('clientes.index') }}"; // Redireciona para a lista
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro!',
                            text: 'Ocorreu um erro ao atualizar o cliente. Por favor, tente novamente.',
                            confirmButtonText: 'Ok'
                        });
                    }
                });
            });
        });
    </script>
@endsection
