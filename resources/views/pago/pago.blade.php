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
        <div class="content">
            <a class="css-boton boton-info" href="{{Request::root()}}/coche">Pagar mas tarde...</a>
            <h1>Compra de {{$coche->marca}} {{$coche->modelo}}</h1>
            <h3>US$ {{number_format($coche->precio, 2)}}</h3>
            <form action="/pago" method="POST">
                {{ csrf_field() }}
                <input id="precio" type="hidden" class="form-control" name="venta" value="{{$venta->id }}">
                <input id="precio" type="hidden" class="form-control" name="precioCoche" value="{{$coche->precio }}">
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{ config('services.stripe.key') }}"
                    data-amount="{{$coche->precio}}"
                    data-name="Compra"
                    data-description="Prueba compra"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto">
                </script>
            </form>
        </div>
    </div>
</body>
</html>
