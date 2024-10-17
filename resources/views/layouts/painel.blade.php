<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAKAI</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">


    <link rel="stylesheet" href="{{ asset('painel/css/style.min.css') }}">
    <style>
        :root {
            /* Light Theme Colors */
            --bg-color: #f8f9fa;
            --text-color: #212529;
            --sidebar-bg: #343a40;
            --sidebar-text: white;
            --navbar-bg: #f8f9fa;
            --card-bg: white;
            --card-text: #212529;
            --table-bg: #ffffff;
            --table-text: #212529;
            --link-hover-bg: rgba(0, 0, 0, 0.1);
        }

        body.dark-mode {
            /* Dark Theme Colors */
            --bg-color: #343a40;
            --text-color: #f8f9fa;
            --sidebar-bg: #212529;
            --sidebar-text: #adb5bd;
            --navbar-bg: #212529;
            --card-bg: #495057;
            --card-text: #f8f9fa;
            --table-bg: #495057;
            --table-text: #f8f9fa;
            --link-hover-bg: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <span class="toggle-btn" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </span>
        <h3 class="text-white text-center">MAKAI</h3>
        <a href="{{ route('index') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
        <a href="#" data-toggle="collapse" data-target="#userSubmenu" aria-expanded="false">
            <i class="fas fa-users"></i> <span>Usuários</span> <i class="fas fa-chevron-down ml-auto"></i>
        </a>

        <!-- Submenu -->
        <div id="userSubmenu" class="collapse submenu">
            <a href="{{ route('users.index') }}"><i class="fas fa-user-plus"></i> <span>Gerenciar Usuários</span></a>

        </div>
        <a href="#" data-toggle="collapse" data-target="#clienteSubmenu" aria-expanded="false">
            <i class="fas fa-building"></i> <span>Clientes</span> <i class="fas fa-chevron-down ml-auto"></i>
        </a>

        <!-- Submenu -->
        <div id="clienteSubmenu" class="collapse submenu">
            <a href="{{ route('clientes.index') }}"><i class="fas fa-user-plus"></i> <span>Gerenciar Clientes</span></a>
            {{-- <a href="{{ route('clientes.docs') }}"><i class="fas fa-file"></i> <span>Docs Clientes</span></a> --}}

        </div>
        <a href="#" data-toggle="collapse" data-target="#cadastros" aria-expanded="false">
            <i class="fas fa-list"></i> <span>Cadastros</span> <i class="fas fa-chevron-down ml-auto"></i>
        </a>

        <!-- Submenu -->
        <div id="cadastros" class="collapse submenu">
            <a href="{{ route('doc_tipos.index') }}"><i class="fas fa-file"></i> <span>Tipos Documentos</span></a>


        </div>
        <a href="#"><i class="fas fa-cog"></i> <span>Configurações</span></a>
        <a href="#"><i class="fas fa-users"></i> <span>Usuários</span></a>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                class="fas fa-sign-out-alt"></i> <span>Sair</span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">Painel</a>
        <span class="theme-toggle-btn" onclick="toggleTheme()">
            <i id="theme-icon" class="fas fa-sun"></i>
        </span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Início <span class="sr-only">(atual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Notificações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div id="content" class="content">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    @yield('js')
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const navbar = document.getElementById('navbar');
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
            navbar.classList.toggle('collapsed');
        }
        // Ao carregar a página, verificamos se o tema foi salvo no localStorage
        window.onload = function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                document.body.classList.add(savedTheme);
                updateThemeIcon(savedTheme);
            }
        };

        // Alterna o tema e salva no localStorage
        function toggleTheme() {
            const body = document.body;
            const currentTheme = body.classList.contains('dark-mode') ? 'dark-mode' : 'light-mode';
            const newTheme = currentTheme === 'dark-mode' ? 'light-mode' : 'dark-mode';

            body.classList.toggle('dark-mode');
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        }

        // Atualiza o ícone de tema
        function updateThemeIcon(theme) {
            const themeIcon = document.getElementById('theme-icon');
            if (theme === 'dark-mode') {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            } else {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }
        }
    </script>
</body>

</html>
