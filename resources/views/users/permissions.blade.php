@extends('layouts.painel')

@section('content')
    <h1>Permissões</h1>
    <p>Olá, {{ Auth::user()->name }}</p>
    <p>Seja bem-vindo ao painel de controle do sistema.</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
        Cadastrar Permissão </button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->description }}</td>
                    <td>
                        {{-- <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info">Detalhes</a>
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
@endsection
