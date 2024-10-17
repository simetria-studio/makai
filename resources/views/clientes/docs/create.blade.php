@extends('layouts.painel')

@section('content')
    <div class="container">
        <h1 class="my-4">Documentos de {{ $cliente->nome }}</h1>

        <div class="card shadow-sm rounded">
            <div class="card-body">
                <form action="{{ route('clientes.docs.store', $cliente->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="doc_tipo">Tipo de Documento:</label>
                        <select class="form-control" id="doc_tipo" name="doc_tipo[]" multiple required>
                            @foreach ($docTipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="nome">Nome do Documento:</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                            placeholder="Nome do documento" required>
                    </div>

                    <div class="form-group">
                        <label for="data">Data:</label>
                        <input type="date" class="form-control" id="data" name="data" required>
                    </div>

                    <div class="form-group">
                        <label for="docs">Arquivos do Documento (múltiplos):</label>
                        <input type="file" class="form-control-file" id="docs" name="docs[]" multiple required>
                    </div>

                    <button type="submit" class="btn btn-primary">Adicionar Documentos</button>
                </form>
            </div>
        </div>

        <!-- Exibir documentos existentes -->
        <div class="mt-4">
            <h4>Documentos Existentes</h4>
            <ul class="list-group">
                @foreach ($cliente->docs as $doc)
                    <li class="list-group-item">
                        {{ $doc->nome }} - {{ $doc->data }}
                        @foreach (json_decode($doc->docs) as $file)
                            - <a href="{{ asset('storage/' . $file) }}" target="_blank">Visualizar Documento</a>
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
