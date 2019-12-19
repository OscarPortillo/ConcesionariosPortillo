@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    <a href="/coche" class="css-boton boton-primario">Atrás</a>
                    <h1 style="text-align: center;">Detalles del {{$coche->marca}} {{$coche->modelo}}.</h1>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="thumbnail">
                                    <img src="/images/{{$coche->imagen}}" class="imgCoche">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <div class="caption">
                                        <strong>Marca:</strong> {{$coche->marca}}
                                    </div>
                                    <div class="caption">
                                        <strong>Modelo:</strong> {{$coche->modelo}}
                                    </div>
                                    <div class="caption">
                                        <strong>Precio:</strong> {{$coche->precio}}
                                    </div>
                                    <div class="caption">
                                        <strong>Año:</strong> {{$coche->año}}
                                    </div>
                                    <div class="caption">
                                        <strong>Detalles:</strong> {{$coche->detalle}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
