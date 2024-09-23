<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MAKAI - GESTÃO DE PROCESSO</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('painel/css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('painel/css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('painel/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('painel/css/responsive.css') }}">
    <!-- Full calendar -->
    <link href='fullcalendar/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/timegrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/list/main.css' rel='stylesheet' />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('painel/images/logo-1.png') }}" class="img-fluid" alt="">
                    <span>MAKAI</span>
                </a>
                <div class="iq-menu-bt-sidebar">
                    <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                            <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar-scrollbar">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li class="iq-menu-title"><i class="ri-subtract-line"></i><span>Dashboard</span></li>

                        <li>
                            <a href="#menu-design" class="iq-waves-effect collapsed" data-toggle="collapse"
                                aria-expanded="false"><i class="ri-menu-3-line"></i><span>Usuários</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="menu-design" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li><a href="#"><i class="ri-git-commit-line"></i>Criar</a>
                                </li>

                            </ul>
                        </li>


                    </ul>
                </nav>
                <div class="p-3"></div>
            </div>
        </div>
        <!-- TOP Nav Bar -->
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <div class="iq-sidebar-logo">
                    <div class="top-logo">
                        <a href="index.html" class="logo">
                            <img src="{{ asset('painel/images/logo-1.png') }}" class="img-fluid" alt="">
                            <span>MAKAI</span>
                        </a>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light p-0">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-list">

                        </ul>
                    </div>
                    <ul class="navbar-list">
                        <li>
                            <a href="#"
                                class="search-toggle iq-waves-effect d-flex align-items-center bg-primary rounded">
                                <img src="{{ asset('painel/images/user/1.jpg') }}" class="img-fluid rounded mr-3"
                                    alt="user">
                                <div class="caption">
                                    <h6 class="mb-0 line-height text-white">{{ Auth::user()->name }}</h6>
                                    <span class="font-size-12 text-white">Disponivel</span>
                                </div>
                            </a>
                            <div class="iq-sub-dropdown iq-user-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white line-height">Olá {{ Auth::user()->name }}</h5>
                                            <span class="text-white font-size-12">disponivel</span>
                                        </div>


                                        <div class="d-inline-block w-100 text-center p-3">
                                            <form method="POST" action="{{ route('logout') }}" id="logout">
                                             @csrf
                                                <button class="bg-primary iq-sign-btn" 
                                                    role="button">Sair<i class="ri-login-box-line ml-2"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>


            </div>
        </div>
        <!-- TOP Nav Bar END -->
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    <footer class="bg-white iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6 text-right">
                    Copyright {{ \Carbon\Carbon::parse(Now())->format('Y') }} <a href="#">MAKAI</a> Todos os
                    direitos reservados.
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('painel/js/jquery.min.js') }}"></script>
    <script src="{{ asset('painel/js/popper.min.js') }}"></script>
    <script src="{{ asset('painel/js/bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('painel/js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset('painel/js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('painel/js/waypoints.min.js') }} "></script>
    <script src="{{ asset('painel/js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('painel/js/wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset('painel/js/apexcharts.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('painel/js/slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset('painel/js/select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset('painel/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('painel/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('painel/js/smooth-scrollbar.js') }}"></script>
    <!-- lottie JavaScript -->
    <script src="{{ asset('painel/js/lottie.js') }}"></script>
    <!-- am core JavaScript -->
    <script src="{{ asset('painel/js/core.js') }}"></script>
    <!-- am charts JavaScript -->
    <script src="{{ asset('painel/js/charts.js') }}"></script>
    <!-- am animated JavaScript -->
    <script src="{{ asset('painel/js/animated.js') }}"></script>
    <!-- am kelly JavaScript -->
    <script src="{{ asset('painel/js/kelly.js') }}"></script>
    <!-- Flatpicker Js -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('painel/js/chart-custom.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('painel/js/custom.js') }}"></script>

    @yield('js')

    <script>
         function logout() {
               document.getElementById('logout').submit();
         }
    </script>
</body>

</html>
