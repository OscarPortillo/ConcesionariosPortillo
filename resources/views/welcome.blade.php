<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/programa.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Inicio</a>
            @else
            <a href="{{ route('login') }}">Entrar</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Registrarse</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="titulo m-b-md">
                Concesionarios Portillo.
            </div>

            <div class="links">
                <a href="/home">Inicio</a>
                <a href="/coche">Coches</a>
                <a href="/users">Usuarios</a>
                <a href="/vendedor">Empleados</a>
                <a href="/cliente">Clientes</a>
                <a href="/ventas">Ventas</a>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Más información</h5>
                            </div>

                            <div class="card-body">
                            Aquí poner información, como de quienes somos, nuestros objetivos, ideales o cosas de esas.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </body>
</html>
