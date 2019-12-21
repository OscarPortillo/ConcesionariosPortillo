
<!DOCTYPE html>
<html>
<head>
    <title>Factura</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    	ul li {
    		list-style: none;
    	}
    	li {
    		font-size: 14px;
    	}
    </style>
</head>
<body>
	<div class="container">
		<div>
			<h1 class="text-center">Factura</h1>
		</div>	
		<div class="col-md-6">
			<h5>Información del cliente</h5>
			<ul>
			  	<li><strong>DNI: </strong>{{$cliente->dni}}</li>
				<li><strong>Nombre: </strong>{{$cliente->nombre}}</li>
				<li><strong>Apellido: </strong>{{$cliente->apellido}}</li>
				<li><strong>Correo: </strong>{{$cliente->email}}</li>
				<li><strong>Dirección: </strong>{{$cliente->direccion}}</li>
			</ul>
		</div>
		<hr>
		<div class="col-md-6">			
			<h5>Información del empleado</h5>
			<ul>
			  	<li><strong>DNI: </strong>{{$empleado->dni}}</li>
				<li><strong>Nombre: </strong>{{$empleado->nombre}}</li>
				<li><strong>Apellido: </strong>{{$empleado->apellido}}</li>
				<li><strong>Correo: </strong>{{$empleado->email}}</li>
				<li><strong>Dirección: </strong>{{$empleado->direccion}}</li>
				<li><strong>Telefono: </strong>{{$empleado->telefono}}</li>
			</ul>
		</div>
		<hr>
		<div class="col-md-6">
			<h5>Información del coche</h5>
			<ul>
		  		<li><strong>Marca: </strong> {{$coche->marca}}</li>
				<li><strong>Modelo: </strong> {{$coche->modelo}}</li>
				<li><strong>Matrícula: </strong> {{$coche->matricula}}</li>
				<li><strong>Año: </strong> {{$coche->año}}</li>
				<li><strong>Precio: </strong> {{number_format($coche->precio, 2)}} $.</li>
			</ul>
		</div>
		<hr>
		<footer>
			<div class="col-md-12">
				<h6 class="text-center">©2019 Concesionarios Portillo, S. A.</h6>
			</div>
		</footer>
	</div><!-- container -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
