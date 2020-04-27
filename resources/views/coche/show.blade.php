@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    <a href="/coche" class="css-boton boton-primario">Atrás</a>
                    @can('update', $user)
                        <a href="/coche/{{$coche->id}}/edit" class="css-boton boton-primario">Editar</a>
                    @endcan
                    @can('delete', $user)
                        <a href="/coche/{{$coche->id}}/borrar" class="css-boton boton-borrarCoche">Borrar</a>
                    @endcan
                    <a href="/ventas/{{$coche->id}}/comprar" class="css-boton boton-primario">Comprar</a>
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
                                        <strong>Precio:</strong> {{number_format($coche->precio, 2)}} $.
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
