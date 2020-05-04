@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    <h1 style="text-align: center;">Lista de los coches.</h1>
                    @can('create', $user)
                    <a class="css-boton boton-primario" href="/coche/create">Crear coche</a>
                    @endcan
                        <button class="css-boton boton-primario dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ordenar por precio
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button"id="ordenarAscendente">Ascendente</button>
                            <button class="dropdown-item" type="button" id="ordenarDescendente">Descendente</button>
                        </div>
                    <!--<div class="container-fluid">-->
                    <div class="form-group col-md-6">
                        <input class="form-control" id="misCoches" type="text" placeholder="Buscar...">
                    </div>
                    <div class="row">
                        <section class="sectionCoche">
                            @foreach ($coches as $coche)
                                <div class="infoCoche">

                                    <div class="modal fade" id="coche{{$coche->id}}" tabindex="-1" role="dialog" aria-labelledby="modalVerDetalleCoche" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <ul class="topnav">
                                                        <li>
                                                            <a class="modal-title" id="modalVerDetalleCoche">Detalles del {{$coche->marca}} {{$coche->modelo}} </a>
                                                        </li>
                                                        <li>
                                                            <a href="/coche/{{$coche->id}}">Ver</a>
                                                        </li>
                                                        @can ('update', $user)
                                                        <li>
                                                            <a href="/coche/{{$coche->id}}/edit">Editar</a>
                                                        </li>
                                                        @endcan
                                                        @can ('delete', $user)
                                                        <li>
                                                            <a href="/coche/{{ $coche->id }}/borrar" class="borrarCoche">Borrar </a>
                                                        </li>
                                                        @endcan
                                                        <li class="right">
                                                            <a href="/ventas/{{$coche->id}}/comprar">Comprar </a>
                                                        </li>
                                                    </ul>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-8">
                                                            <img src="images/{{$coche->imagen}}" class="imgCoche" alt="">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><strong>Marca:</strong> {{$coche->marca}}</h5>
                                                                    <h5 class="card-title"><strong>Modelo:</strong> {{$coche->modelo}}</h5>
                                                                    <h5 class="card-title"><strong>Año:</strong> {{$coche->año}}</h5>
                                                                    <h5 class="card-title"><strong>Precio:</strong> {{$coche->precio}} $</h5>
                                                                    <h5 class="card-title"><strong>Detalle:</strong></h5>
                                                                    <p class="card-text">{{$coche->detalle}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="images/{{$coche->imagen}}" class="imgCoche" alt="">
                                    <h5> <strong> Marca: </strong>{{$coche->marca}} {{$coche->modelo}}</h5>
                                    <h5 id="precio" data-sort='{{$coche->precio}}'> <strong> Precio: </strong>{{number_format($coche->precio, 2)}} $.</h5>
                                    <button type="button" class="css-boton boton-info" data-toggle="modal" data-target="#coche{{$coche->id}}">
                                        Ver detalles
                                    </button>
                                </div>
                            @endforeach
                        </section>
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
