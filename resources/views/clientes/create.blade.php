@extends('layouts.painel')

@section('content')
    <div class="container">
        <h1 class="my-4">Cadastrar Novo Cliente</h1>

        <div class="card shadow-sm rounded">
            <div class="card-body">
                <form id="clienteForm">
                    @csrf

                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do cliente" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail do cliente">
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone do cliente">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cep">CEP:</label>
                            <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
                        </div>

                        <div class="form-group col-md-8">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="numero">Número:</label>
                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Número">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="complemento">Complemento:</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="estado">Estado:</label>
                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="pais">País:</label>
                            <input type="text" class="form-control" id="pais" name="pais" value="Brasil" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="responsavel">Responsável:</label>
                        <input type="text" class="form-control" id="responsavel" name="responsavel" placeholder="Nome do responsável">
                    </div>

                    <div class="form-group">
                        <label for="documento">Documento:</label>
                        <input type="text" class="form-control" id="documento" name="documento" placeholder="CPF/CNPJ">
                    </div>

                    <div class="form-group">
                        <label for="observacao">Observação:</label>
                        <textarea class="form-control" id="observacao" name="observacao" rows="3" placeholder="Observações adicionais"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1" selected>Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Cadastrar Cliente</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            // Função para buscar o endereço baseado no CEP
            $('#cep').on('blur', function () {
                let cep = $(this).val().replace(/\D/g, ''); // Remove caracteres não numéricos

                if (cep.length === 8) { // Verifica se o CEP tem 8 dígitos
                    $.ajax({
                        url: `https://viacep.com.br/ws/${cep}/json/`,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if (!data.erro) {
                                // Preenche os campos do formulário com os dados do ViaCEP
                                $('#endereco').val(data.logradouro);
                                $('#bairro').val(data.bairro);
                                $('#cidade').val(data.localidade);
                                $('#estado').val(data.uf);
                            } else {
                                Swal.fire('Erro!', 'CEP não encontrado.', 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Erro!', 'Falha ao buscar o CEP.', 'error');
                        }
                    });
                }
            });

            // Envio do formulário via AJAX
            $('#clienteForm').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    url: "{{ route('clientes.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Cliente cadastrado com sucesso!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = "{{ route('clientes.index') }}";
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro!',
                            text: 'Ocorreu um erro ao cadastrar o cliente. Por favor, tente novamente.',
                            confirmButtonText: 'Ok'
                        });
                    }
                });
            });
        });
    </script>
@endsection
