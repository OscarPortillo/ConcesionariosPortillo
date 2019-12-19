@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
        
            <div class="card">
            
                <div class="card-header">Verificando la venta...</div>
                <div class="card-body">
                <a href="/ventas" class="css-boton boton-primario">Atrás</a>
                     <form method="post" action="/ventas/{{ $venta->id }}/edit">
                        {{ csrf_field() }}
                         <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$venta->id}}">
                        <div class="form-row">
                        	<div class="form-group col-md-12 offset-5">
                        		<strong>Estado de la venta</strong>
                        	</div>
                            <div class="form-group col-md-3">
                                <label for="estado">Estado</label>
                                <select class="form-control" name="estado" id="estadoVenta" disabled="">
                                    @if($venta->estado ==='Pendiente')
                                    <option class="estadoRojo" value="Pendiente" selected>{{$venta->estado}}</option>
                                    <option class="estadoVerde" value="Pagado">Pagado</option>
                                    @endif
                                     @if($venta->estado ==='Pagado')
                                    <option class="estadoVerde" value="Pagado" selected>{{$venta->estado}}</option>
                                    <option class="estadoRojo" value="Pendiente">Pendiente</option>
                                    @endif
                                </select>
                                
                            </div><!--estado-->
                            <div class="form-group col-md-3">
                            	<label for="documentos">Documentación</label>
                            	<div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle form-control" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Ver PDF'S
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" target="_blank" href="../archivos/{{$venta->renta}}">Renta</a>
                                        <a class="dropdown-item" target="_blank" href="../archivos/{{$venta->dni_cliente}}">DNI</a>
                                        <a class="dropdown-item" target="_blank" href="../archivos/{{$venta->licenciaConducir}}">Carné</a>
                            		</div>
                                </div>
                            </div>
                            <div class="form-group col-md-3" id="cambiosVenta">
                            	<label for="cambios">Cambios</label>
                                 <button type="submit" class="form-control css-boton boton-error">
                                    {{ __('Cambiar estado de la venta') }}
                                </button>
                            </div><!--estado-->
                            <div class="form-group col-md-3" id="enviarCorreo">
                                <label for="email">Correo</label>
                                <a class="form-control boton-primario" href="{{$venta->id}}/enviarEmailDeCompra">Enviar factura</a>
                            </div>
                            <div class="form-group col-md-3" id="solicitarPago">
                                <label for="email">Solicitar pago.</label>
                                <a class="form-control estadoRojo" href="{{$venta->id}}/solicitarPago">Solicitar pago.</a>
                            </div>

                            <!--INFO CLIENTES-->

                        	<div class="form-group col-md-12 offset-5">
                        		<strong>Información del cliente</strong>
                        	</div>
                            <div class="form-group col-md-3">
                                 <label for="nombre">Nombre</label>
                                 <input id="nombre" class="form-control" name="nombre" value="{{$cliente->nombre }}" disabled>
                            </div><!--nombre-->
                            <div class="form-group col-md-3">
                                 <label for="apellido">Apellido</label>
                                 <input id="apellido" class="form-control" name="apellido" value="{{$cliente->apellido }}" disabled>
                            </div><!--apellido-->
                            <div class="form-group col-md-3">
                                 <label for="email">Correo</label>
                                 <input id="email" class="form-control" name="email" value="{{$cliente->email }}" disabled>
                            </div><!--email-->
                            <div class="form-group col-md-3">
                                 <label for="dni">DNI</label>
                                 <input id="dni" class="form-control" name="dni" value="{{$cliente->dni }}" disabled>
                            </div><!--dni-->

                            <!--INFO EMPLEADO-->

                            <div class="form-group col-md-12 offset-5">
                        		<strong>Información del empleado</strong>
                        	</div>
                            <div class="form-group col-md-3">
                                 <label for="nombre">Nombre</label>
                                 <input id="nombre" class="form-control" name="nombre" value="{{$empleado->nombre }}" disabled>
                            </div><!--nombre-->
                            <div class="form-group col-md-3">
                                 <label for="apellido">Apellido</label>
                                 <input id="apellido" class="form-control" name="apellido" value="{{$empleado->apellido }}" disabled>
                            </div><!--apellido-->
                            <div class="form-group col-md-3">
                                 <label for="email">Correo</label>
                                 <input id="email" class="form-control" name="email" value="{{$empleado->email }}" disabled>
                            </div><!--email-->
                            <div class="form-group col-md-3">
                                 <label for="dni">DNI</label>
                                 <input id="dni" class="form-control" name="dni" value="{{$empleado->dni }}" disabled>
                            </div><!--dni-->

                            <!--INFO COCHE-->

                            <div class="form-group col-md-12 offset-5">
                        		<strong>Información del coche</strong>
                        	</div>
                            <div class="form-group col-md-6">
                                 <img src="/images/{{$coche->imagen}}" class="img-fluid">
                            </div><!--imagen-->
                            <div class="form-group col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title"><strong>Marca:</strong> {{$coche->marca}}</h5>
                                    <h5 class="card-title"><strong>Modelo:</strong> {{$coche->modelo}}</h5>
                                    <h5 class="card-title"><strong>Año:</strong> {{$coche->año}}</h5>
                                    <h5 class="card-title"><strong>Precio:</strong> {{$coche->precio}} $</h5>
                                    <h5 class="card-title"><strong>Detalle:</strong></h5>
                                    <p class="card-text">{{$coche->detalle}}</p>
                                </div>
	                        </div><!--apellido-->                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
