@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Ventas pendientes
                    <a class="btn boton-primario" href="/venta/export">Exportar excel</a>
                </div>
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
                                    <th>Pagar</th>
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
                                        @if($venta->estado === 'Pendiente' && $user->id === $venta->id_cliente)
                                        <td>
                                            <a href="/solicitarPago/{{$venta->id}}/edit" class="css-boton boton-primario">Pagar</a>
                                        </td>
                                        @endif
                                        @if($venta->estado === 'Pagado')
                                        <td>
                                            <a href="/ventas/{{$venta->id}}/verMiCompra" class="css-boton boton-primario">ver</a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endcan
                                    @endforeach
                            </tbody>
                        </table>
                        @else
                            @if(Auth::user()->role_id == 1)
                                <div class="alert alert-danger">
                                    <h1>No hay ventas!!!</h1>
                                </div>
                            @endif
                        @endif

                        @if(Auth::user()->role_id == 2 && $contadorVentasEmpleado == 0)
                            <div class="alert alert-danger">
                                <h1>¡No tienes ventas asignadas!</h1>
                            </div>
                        @endif
                        @if(Auth::user()->role_id == 3 && $contadorVentasCliente == 0)
                            <div class="alert alert-danger">
                                <h1>¡No has realizado ninguna compra!</h1>
                                <a class="css-boton boton-primario" href="/coche">Compra coches.</a>
                            </div>
                        @endif
                    </div>                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
