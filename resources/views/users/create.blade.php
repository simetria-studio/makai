@extends('layouts.painel')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h4><i class="fas fa-user-plus"></i> Cadastrar Novo Usuário</h4>
                </div>
                <div class="card-body">
                    <form id="userForm" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Digite a senha" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="permission">Permissão:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                </div>
                                <select class="form-control" id="permission" name="permission" required>
                                    <option value="" disabled selected>Selecione uma permissão</option>
                                    @foreach ($permissions as $key => $role)
                                        <option value="{{ $key }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="button" class="btn btn-success store-user">
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                <i class="fas fa-save"></i> Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.store-user').click(function () {
                let button = $(this);
                let formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    permission: $('#permission').val(),
                    _token: $('input[name="_token"]').val()
                };

                // Desativa o botão e mostra o spinner
                button.prop('disabled', true);
                button.find('.spinner-border').removeClass('d-none');

                $.ajax({
                    url: "{{ route('users.store') }}",
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuário cadastrado com sucesso!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = "{{ route('users.index') }}";
                        });
                    },
                    error: function (xhr) {
                        // Reativa o botão e esconde o spinner
                        button.prop('disabled', false);
                        button.find('.spinner-border').addClass('d-none');

                        // Lida com os erros da requisição AJAX
                        let errorMessage = 'Ocorreu um erro ao cadastrar o usuário.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Erro!',
                            text: errorMessage,
                            confirmButtonText: 'Ok'
                        });
                    }
                });
            });
        });
    </script>
@endsection
