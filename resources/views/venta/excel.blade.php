
	<table>
		<thead>
			<tr>
				<td>Cliente</td>
				<td>DNI Cliente</td>
				<td>Empleado</td>
				<td>DNI Empleado</td>
				<td>Marca</td>
				<td>Matrícula</td>
				<td>Precio</td>
			</tr>
		</thead>
		<tbody>
			@foreach($ventas as $venta)
				@can ('view', $venta)
				<tr>
				@foreach($usuarios as $usuario)
						@if($venta->id_cliente == $usuario->id)
						<td>{{$usuario->nombre}} {{$usuario->apellido}}</td>
						<td>{{$usuario->dni}}</td>
						@endif
						@endforeach
					@foreach($usuarios as $usuario)
						@if($venta->id_empleado == $usuario->id)
							<td>{{$usuario->nombre}} {{$usuario->apellido}}</td>
							<td>{{$usuario->dni}}</td>
						@endif
						@endforeach
						@foreach($coches as $coche)
							@if($venta->bastidorCoche == $coche->numeroBastidor)
							<td>{{$coche->marca}}</td>
							<td>{{$coche->matricula}}</td>
							<td>{{$coche->precio}}</td>
							@endif
						@endforeach
					</tr>
					@endcan
				@endforeach

		</tbody>
	</table>