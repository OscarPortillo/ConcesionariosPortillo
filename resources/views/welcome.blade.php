<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Concesionarios Portillo</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/programa.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Styles -->
    <style>
    html, body {
        background-color: #f5f5f5;
        color: black;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 50vh;
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
        color: black;
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
    .about{
        font-size: 2.10rem;
    }

.fila {
  margin: 8px -16px;
}

/* Add padding BETWEEN each columna */
.fila,
.fila > .columna {
  padding: 8px;
}

/* Create four equal columnas that floats next to each other */
.columna {
  float: left;
  width: 25%;
}

/* Clear floats after filas */ 
.fila:after {
  content: "";
  display: table;
  clear: both;
}

/* Contenido */
.contenido {
  background-color: white;
  padding: 10px;
}

/* Responsive layout - makes a two columna-layout instead of four columnas */
@media screen and (max-width: 900px) {
  .columna {
    width: 50%;
  }
}

/* Responsive layout - makes the two columnas stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .columna {
    width: 100%;
  }
}
</style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Ver más</a>
            @else
            <a href="{{ route('login') }}">Entrar</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Registrarse</a>
            @endif
            @endauth
        </div>
        @endif
        <div>
            <div class="content">
                <div class="titulo m-b-md">
                    Concesionarios Portillo
                </div>

                <div class="links">
                    <a href="/coche">Coches</a>
                    <a href="/users">Usuarios</a>
                    <a href="/empleado">Empleados</a>
                    <a href="/cliente">Clientes</a>
                    <a href="/ventas">Ventas</a>
                    <a href="/home">Más...</a>
                </div>
            </div> <!--CONTENT-->
        </div>
    </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="fila">
                                <div class="columna">
                                    <div class="contenido">
                                        <img src="/images/toyota.jpg" alt="Mountains" style="width:100%">
                                        <h3>Toyota</h3>
                                        <p>Lorem ipsum dolor sitamet, tempor prodesset eos no.</p>
                                    </div>
                                </div>
                                <div class="columna">
                                    <div class="contenido">
                                        <img src="/images/mercedez280.jpg" alt="Lights" style="width:100%">
                                        <h3>Mercedez Benz 280</h3>
                                        <p>Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
                                    </div>
                                </div>
                                <div class="columna">
                                    <div class="contenido">
                                        <img src="/images/tesla.jpg" alt="Nature" style="width:100%">
                                        <h3>Tesla</h3>
                                        <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
                                    </div>
                                </div>
                                <div class="columna">
                                    <div class="contenido">
                                        <img src="/images/pontiac.jpg" alt="Mountains" style="width:100%">
                                            <h3>Pontiac Firebird 68</h3>
                                            <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="contenido">
                                <img src="/images/supra.jpg" alt="Bear" style="width:100%">
                                <h3>Toyota GR Supra 2019</h3>
                                <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amettempor prodesset eos no.</p>
                                <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
                            </div>
                            <div class="contenido">
                                <img src="/images/toyota4x4.jpg" alt="Bear" style="width:100%">
                                <h3>Toyota 4x4</h3>
                                <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amettempor prodesset eos no.</p>
                                <p>Lorem ipsum dolor sit amet, tempor prodesset eos no. Temporibus necessitatibus sea ei, at tantas oporteat nam. Lorem ipsum dolor sit amet, tempor prodesset eos no.</p>
                            </div>


                            <p class="text-center">
                                <strong class="about">SOBRE NOSOTROS</strong><br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fermentum sapien ut arcu iaculis congue. Praesent interdum pharetra risus, id pellentesque tortor posuere vel. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dui nisl, facilisis vel velit condimentum, pharetra luctus purus. Donec placerat libero sit amet libero vestibulum commodo. Nam ut sem suscipit, venenatis arcu ac, sagittis lorem. Aliquam facilisis, neque porta sagittis feugiat, quam tellus volutpat sapien, ut convallis dolor turpis aliquet justo. Nam auctor pellentesque hendrerit. Maecenas mollis velit tellus, sit amet ultrices ipsum pharetra ac. Integer ante enim, porta at scelerisque nec, aliquam rutrum leo. Curabitur imperdiet mi tincidunt diam tincidunt, ut scelerisque erat finibus. Sed quam arcu, aliquam quis mi et, dignissim dignissim ipsum. Suspendisse in cursus lacus.

                                Praesent porttitor quis massa sit amet sollicitudin. Fusce in orci nec urna sagittis sagittis. Sed vitae turpis et velit volutpat condimentum at at neque. Mauris venenatis ante sit amet neque porta mollis. In hac habitasse platea dictumst. Sed iaculis id arcu nec vestibulum. Donec nulla felis, mattis in justo eu, tristique tristique enim. Nunc ultrices mollis volutpat. Maecenas pretium risus ac nunc vulputate, a tincidunt orci congue. Etiam leo tellus, imperdiet non sem sit amet, porttitor viverra leo. Cras consequat ex mauris. Nunc interdum magna tellus, sed ipsumerdiet orci pulvinar eget. In tempus efficitur odio sed volutpat.
                            </p>
                            <p class="text-center">
                                <strong class="about">NUESTRA HISTORIA</strong><br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis interdum quis ex id tempor. Morbi quis dictum est. Sed velit orci, euismod a libero et, rhoncus tincidunt arcu. Curabitur ac tellus interdum, placerat enim id, placerat ipsum. Vivamus nec dignissim nunc. Pellentesque id tellus sit amet turpis blandit commodo. Quisque nulla lacus, suscipit aliquet arcu quis, egestas fringilla mauris. Proin luctus augue at rutrum varius. Nulla tempor nisl ut felis convallis, vel semper ex lacinia. Ut vitae lacus in leo sodales vestibulum. Fusce id eleifend lectus.

                                Etiam quis blandit metus. Curabitur auctor rutrum quam, ut hendrerit justo tristique eu. Nullam ac sem felis. Aenean libero lacus, pretium sed massa vel, ornare rhoncus libero. Fusce at dapibus odio. Donec volutpat ultrices sem, et auctor justo cursus vitae. Duis tortor sem, interdum ut ipsum eget, vehicula pulvinar sapien. Phasellus facilisis rhoncus vestibulum. Suspendisse turpis ligula, tincidunt sodales lectus malesuada, dapibus vehicula lectus.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
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
                        <button class="icon-btn facebook"><i class="fab fa-facebook"></i></button>
                        <button class="icon-btn twitter"><i class="fab fa-twitter"></i></i></button>
                        <button class="icon-btn google"><i class="fab fa-google-plus"></i></button>
                        <button class="icon-btn instagram"><i class="fab fa-instagram"></i></button>
                        <button class="icon-btn github"><i class="fab fa-github"></i></button>
                    </section>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2019 Concesionarios Portillo:
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
