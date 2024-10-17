@extends('layouts.painel')

@section('content')
    <div class="container">
        <h1 class="my-4">Detalhes do Cliente</h1>

        <div class="card shadow-sm rounded">
            <div class="card-body">
                <h4 class="card-title">Informações Gerais</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Nome:</strong>
                        <p>{{ $cliente->nome }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Email:</strong>
                        <p>{{ $cliente->email ?? 'Não informado' }}</p>
                    </div>
                </div>

                <h4 class="card-title">Endereço</h4>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Endereço:</strong>
                        <p>{{ $cliente->endereco ?? 'Não informado' }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Número:</strong>
                        <p>{{ $cliente->numero ?? 'Não informado' }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Complemento:</strong>
                        <p>{{ $cliente->complemento ?? 'Não informado' }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Bairro:</strong>
                        <p>{{ $cliente->bairro ?? 'Não informado' }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Cidade:</strong>
                        <p>{{ $cliente->cidade ?? 'Não informado' }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Estado:</strong>
                        <p>{{ $cliente->estado ?? 'Não informado' }}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>CEP:</strong>
                        <p>{{ $cliente->cep ?? 'Não informado' }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>País:</strong>
                        <p>{{ $cliente->pais ?? 'Não informado' }}</p>
                    </div>
                </div>

                <h4 class="card-title">Contato</h4>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Telefone:</strong>
                        <p>{{ $cliente->telefone ?? 'Não informado' }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Responsável:</strong>
                        <p>{{ $cliente->responsavel ?? 'Não informado' }}</p>
                    </div>
                </div>

                <h4 class="card-title">Informações Adicionais</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Documento:</strong>
                        <p>{{ $cliente->documento ?? 'Não informado' }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Observações:</strong>
                        <p>{{ $cliente->observacao ?? 'Nenhuma observação' }}</p>
                    </div>
                </div>

                <h4 class="card-title">Status</h4>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                        <p>
                            <span class="badge {{ $cliente->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                {{ $cliente->status == 1 ? 'Ativo' : 'Inativo' }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary">Editar Cliente</a>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar à Lista</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Se precisar adicionar algum JS adicional, adicione aqui
    </script>
@endsection
