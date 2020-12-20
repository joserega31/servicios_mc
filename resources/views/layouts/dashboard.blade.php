<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{ asset('js/theme.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css') }}">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body id="page-top" class="bg-gradient-primary">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
                <div class="container-fluid d-flex flex-column p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                        <div class="sidebar-brand-text mx-3"><span>helo</span></div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="nav navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('servicio') }}">
                            <i class="fas fa-hand-holding"></i><span>Servicios</span></a>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('maestros') }}">
                            <i class="fa fa-user"></i><span>Maestros</span></a>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('reportes') }}">
                            <i class="fa fa-file"></i><span>Reportes</span></a>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('configuracion') }}">
                            <i class="fas fa-cog"></i><span>Configuraci&oacute;n</span></a>
                        </li>
                    </ul>
                    <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
                </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                            <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Buscar por ...">
                                    <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                </div>
                            </form>
                            <ul class="nav navbar-nav flex-nowrap ml-auto">
                                <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                        <form class="form-inline mr-auto navbar-search w-100">
                                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Buscar por ...">
                                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                    <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"></a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                            <h6 class="dropdown-header">alerts center</h6>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="mr-3">
                                                    <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                                </div>
                                                <div><span class="small text-gray-500">December 12, 2019</span>
                                                    <p>A new monthly report is ready to download!</p>
                                                </div>
                                            </a>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="mr-3">
                                                    <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                                </div>
                                                <div><span class="small text-gray-500">December 7, 2019</span>
                                                    <p>$290.29 has been deposited into your account!</p>
                                                </div>
                                            </a>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="mr-3">
                                                    <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                                </div>
                                                <div><span class="small text-gray-500">December 2, 2019</span>
                                                    <p>Spending Alert: Weve noticed unusually high spending for your account.</p>
                                                </div>
                                            </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                    </li>
                                </li>
                                <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                    <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"></a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                            <h6 class="dropdown-header">alerts center</h6>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="{{ asset("img/avatars/avatar4.jpeg") }}">
                                                    <div class="bg-success status-indicator"></div>
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem Ive been having.</span></div>
                                                    <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                                </div>
                                            </a>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                                    <div class="status-indicator"></div>
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                    <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                                </div>
                                            </a>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg">
                                                    <div class="bg-warning status-indicator"></div>
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate"><span>Last months report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                    <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                                </div>
                                            </a>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
                                                    <div class="bg-success status-indicator"></div>
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they arent good...</span></div>
                                                    <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                                </div>
                                            </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                    </li>
                                    <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                                </li>
                                <div class="d-none d-sm-block topbar-divider"></div>
                                <li class="nav-item dropdown no-arrow" role="presentation">
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                            <span class="d-none d-lg-inline mr-2 text-gray-600 small"> {{ Auth::user()->name }}</span>
                                            <img class="border rounded-circle img-profile" src="{{ asset('img/avatars/avatar1.png') }}">
                                        </a>
                                        <div
                                            class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                            <!--a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                            <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                            <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                                <div class="dropdown-divider"></div-->
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Salir
                                                       
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </div>
                        </li>
                        </li>
                        </ul>
                    </nav>


                    <div id="app">
                        <main>
                            @yield('content')
                        </main>
                    </div>
                
                </div>

    </div>
</body>
</html>
