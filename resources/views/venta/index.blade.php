@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Ventas pendientes</div>
                <div class="card-body">
                    <div class="table-responsive">
                       @if(count($ventas) != 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Info Cliente</th>
                                    <th>Info Empleado</th>
                                    <th>Info Coche</th>
                                    <th>Estado</th>
                                    @can ('update', $user)
                                    <th>Opciones</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach($ventas as $venta)
                                    @can ('view', $venta)
                                    <tr>
                                        @foreach($usuarios as $usuario)
                                            @if($venta->id_cliente == $usuario->id)
                                                <td>{{$usuario->nombre}}</td>
                                            @endif
                                            
                                        @endforeach
                                        @foreach($usuarios as $usuario)
                                            @if($venta->id_empleado == $usuario->id)
                                                <td>{{$usuario->nombre}}</td>
                                            @endif
                                        @endforeach
                                        @foreach($coches as $coche)
                                            @if($venta->bastidorCoche == $coche->numeroBastidor)
                                                <td>{{$coche->marca}} {{$coche->matricula}}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            @foreach( $estados as $estado)
                                                @if($venta->estado === $estado && $estado == 'Pendiente')
                                                <h6 class="botonEstado rojo" href="#">{{$estado}}</h6>
                                                @endif
                                                @if($venta->estado === $estado && $estado == 'Pagado')
                                                <h6 class="botonEstado verde" href="#">{{$estado}}</h6>
                                                @endif
                                            @endforeach
                                        </td>
                                        @can ('update', $user)
                                        <td>
                                            <a href="/ventas/{{$venta->id}}" class="css-boton boton-primario">Editar</a>
                                        </td>
                                        @endcan
                                    </tr>
                                    @endcan
                                    @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="alert alert-danger">
                                <h1>No hay ventas!!!</h1>
                            </div>
                        @endif
                    </div>                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
