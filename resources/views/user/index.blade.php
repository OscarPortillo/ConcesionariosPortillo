@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Lista de usuarios.') }}</div>
                <div class="card-body">
                    @can ('create' , $user)
                    <a href="/users/create" class="css-boton boton-primario">Crear nuevo usuario...</a>
                    <br><br>
                    @endcan
                    <input class="form-control" id="misUsuarios" type="text" placeholder="Buscar...">
                    <br>
                    @if(count($usuarios) != 0)
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
                                @foreach( $usuarios as $usuario)
                                    <tr>
                                        <td>{{$usuario->nombre}}</td>
                                        <td>{{$usuario->apellido}}</td>
                                        <td>{{$usuario->dni}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>{{$usuario->direccion}}</td>
                                        <td>{{$usuario->telefono}}</td>
                                        @foreach($roles as $rol)                                       
                                            @if($usuario->role_id == $rol->id)
                                                <td>{{$rol->nombre}}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Opciones...
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @can('update', $user)
                                                    <a class="dropdown-item" role="button" href="/users/{{ $usuario->id }}/edit">Editar</a>
                                                    @endcan
                                                    @can('delete', $user)
                                                    <form method="post" action="/users/{{ $usuario->id }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="submit" value="borrar" class="dropdown-item">
                                                    </form>
                                                    @endcan
                                                    <a class="dropdown-item" href="/users/{{$usuario->id}}">Ver</a>
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
                                <h1>No hay usuarios!!!</h1>
                            </div>
                        @endif
                      {{$usuarios->render()}}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
