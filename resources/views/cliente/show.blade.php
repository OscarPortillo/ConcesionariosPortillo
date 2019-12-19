@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Información del cliente...') }}</div>
                <div class="card-body">
				<a href="/cliente" class="css-boton boton-primario">Atrás</a>
                	<div class="jumbotron jumbotron-fluid text-center">
                		<h1>{{$cliente->nombre}} {{$cliente->apellido}}</h1>
                	</div>
                	<div class="row">
                		<div class="table-responsive">
		                	<table class="table">
							    <thead class="thead-light">
							      <tr>
							        <th>Dirección</th>
							        <th>DNI</th>
							        <th>Correo</th>
							        <th>Telefono</th>
							        <th>Rol</th>
							      </tr>
							    </thead>
							    <tbody>
							      <tr>
							        <td>{{$cliente->direccion}}</td>
							        <td>{{$cliente->dni}}</td>
							        <td>{{$cliente->email}}</td>
							        <td>{{$cliente->telefono}}</td>
							        @foreach($roles as $rol)                                        
		                                @if($cliente->role_id == $rol->id)
		                                    <td>{{$rol->nombre}}</td>
		                                @endif
		                            @endforeach
							      </tr>
							    </tbody>
							</table>
						</div>
                	</div>
                	
                </div>
        	</div>
    	</div>
	</div>
</div>

@endsection

