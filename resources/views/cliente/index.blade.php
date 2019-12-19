@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Lista de clientes.') }}</div>
                <div class="card-body">
                    <a href="/cliente/create" class="css-boton boton-primario">Crear nuevo cliente...</a>
                    <br><br>
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
                            @foreach( $clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->nombre}}</td>
                                    <td>{{$cliente->apellido}}</td>
                                    <td>{{$cliente->dni}}</td>
                                    <td>{{$cliente->email}}</td>
                                    <td>{{$cliente->direccion}}</td>
                                    <td>{{$cliente->telefono}}</td>
                                        @foreach ($roles as $rol)
                                            @if ($cliente->role_id == $rol->id)
                                                <td>{{$rol->nombre}}</td>
                                            @endif
                                        @endforeach
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Opciones...
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" role="button" href="/cliente/{{ $cliente->id }}/edit">Editar</a>
                                                @can ('delete', $user)
                                                <form method="post" action="/cliente/{{ $cliente->id }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" value="borrar" class="dropdown-item">
                                                </form>
                                                @endcan
                                                <a class="dropdown-item" href="/cliente/{{$cliente->id}}">Ver</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                  </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
