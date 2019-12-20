@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Lista de empleados.') }}</div>
                <div class="card-body">
                    @can ('create', $user)
                    <a href="/empleado/create" class="css-boton boton-primario">Crear nuevo empleado...</a>
                    @endcan
                    <a href="/ventas" class="css-boton boton-primario">Ver ventas...</a>
                    <br><br>
                    @if(count($empleados) != 0)
                    <input class="form-control" id="misUsuarios" type="text" placeholder="Buscar...">
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                        <tbody id="listaUsuarios">
                            @foreach( $empleados as $empleado)
                                <tr>
                                    <td>{{$empleado->nombre}}</td>
                                    <td>{{$empleado->apellido}}</td>
                                    <td>{{$empleado->dni}}</td>
                                    <td>{{$empleado->email}}</td>
                                    <td>{{$empleado->direccion}}</td>
                                    <td>{{$empleado->telefono}}</td>
                                        @foreach ($roles as $rol)
                                            @if ($empleado->role_id == $rol->id)
                                                <td>{{$rol->nombre}}</td>
                                            @endif
                                        @endforeach
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Opciones...
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" role="button" href="/empleado/{{ $empleado->id }}/edit">Editar</a>
                                                @can ('delete', $user)
                                                <form method="post" action="/empleado/{{ $empleado->id }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" value="borrar" class="dropdown-item">
                                                </form>
                                                @endcan
                                                <a class="dropdown-item" href="/empleado/{{$empleado->id}}">Ver</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
                @else
                    <div class="alert alert-danger">
                        <h1>No hay empleados!!!</h1>
                    </div>
                @endif
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
