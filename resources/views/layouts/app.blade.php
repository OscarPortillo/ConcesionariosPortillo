<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Concesionarios Portillo</title>
    <!--<title>{{ config('app.name', 'Concesionarios Portillo') }}</title>-->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <!--JQuery-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/programa.css') }}" rel="stylesheet">

    <script src="{{ asset('js/programa.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel cabecera">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!--{{ config('app.name', 'Concesionarios Portillo') }}-->
                    <img src="/logo/logo.png" width="90px" height="40px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active listaCabecera">
                            <a class="nav-link" href="/">Inicio </a>
                        </li>
                        <li class="nav-item active listaCabecera">
                            <a class="nav-link" href="/coche">Coches </a>
                        </li>
                        @guest
                        @else
                            <li class="nav-item active listaCabecera">
                                <a class="nav-link" href="/users/miperfil/{{Auth::user()->id}}">Mi perfil </a>
                            </li>
                            @if(Auth::user()->role_id == '1' || Auth::user()->role_id == '2')
                                
                                <li class="nav-item active listaCabecera">
                                    <a class="nav-link" href="/empleado">Empleados </a>
                                </li>
                                <li class="nav-item active listaCabecera">
                                    <a class="nav-link" href="/users">Usuarios </a>
                                </li>
                                <li class="nav-item active listaCabecera">
                                    <a class="nav-link" href="/cliente">Clientes </a>
                                </li>
                                <li class="nav-item active listaCabecera">
                                    <a class="nav-link" href="/ventas">Ventas </a>
                                </li>                            
                            @endif
                            @if(Auth::user()->role_id == '3')
                            <li class="nav-item active listaCabecera">
                                <a class="nav-link" href="/ventas">Mis compras </a>
                            </li>  
                            @endif
                            <li class="nav-item active listaCabecera">
                                <a class="nav-link" href="/home">Más...</a>
                            </li>
                        @endguest                        
                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item listaCabecera">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item listaCabecera">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nombre }} {{ Auth::user()->apellido }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right cerrarSesion" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item " href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<!-- Footer -->
    <footer class="page-footer font-small teal pt-4">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3 contacto">
                    <h5 class="text-uppercase font-weight-bold">Contacta con nosotros</h5>
                    <h5 class="card-title"><strong>Telefono:</strong> 662054899</h5>
                    <h5 class="card-title"><strong>Correo:</strong> concesionariosportillo@gmail.com</h5>
                    <h5 class="card-title"><strong>Dirección:</strong> 7178 Erling Dale Schusterview</h5>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-6 mb-md-0 mb-3">
                    <h5 class="text-uppercase font-weight-bold">Siguenos en nuestras redes sociales</h5>
                    <section class="social">
                        <button class="icon-btn facebook" onclick="window.location.href='https://www.facebook.com/'">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button class="icon-btn twitter" onclick="window.location.href='https://twitter.com/oscar_9414'">
                            <i class="fab fa-twitter"></i></i>
                        </button>
                        <button class="icon-btn bitbucket" onclick="window.location.href='https://bitbucket.org/oscar_9414/'">
                            <i class="fab fa-bitbucket"></i>
                        </button>
                        <button class="icon-btn instagram" onclick="window.location.href='https://www.instagram.com/ohportillo/'">
                            <i class="fab fa-instagram"></i>
                        </button>
                        <button class="icon-btn github" onclick="window.location.href='https://github.com/oscarportillo'">
                            <i class="fab fa-github"></i>
                        </button>
                    </section>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2020 Concesionarios Portillo:
        </div>
    </footer>
</body>
</html>
