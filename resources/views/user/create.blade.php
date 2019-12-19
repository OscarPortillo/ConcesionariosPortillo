@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar un nuevo Usuario') }}</div>
                <div class="card-body">
                <a href="/users" class="css-boton boton-primario">Atrás</a>
                     <form method="POST" action="/users" name="frm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                 <label for="dni">DNI</label>
                                    <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}" placeholder="Introduce nº DNI..."  autofocus>
                                    @if($errors->first('dni'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('dni') }}
                                        </div>
                                    @endif
                            </div><!--DNI-->
                            <div class="form-group col-md-6">
                                 <label for="nombre">Nombre</label>
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Introduzca su nombre..."  autofocus>
                                    @if($errors->first('nombre'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('nombre') }}
                                        </div>
                                    @endif
                            </div><!--nombre-->
                            <div class="form-group col-md-6">
                                 <label for="apellido">Apellido</label>
                                    <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" placeholder="Introduzca su apellido..."  autofocus>
                                    @if($errors->first('apellido'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('apellido') }}
                                        </div>
                                    @endif
                            </div><!--apellido-->
                            <div class="form-group col-md-6">
                                 <label for="direccion">Direccion</label>
                                    <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" placeholder="Introduzca su direccion..."  autofocus>
                                    @if($errors->first('direccion'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('direccion') }}
                                        </div>
                                    @endif
                            </div><!--direccion-->
                            <div class="form-group col-md-6">
                                 <label for="email">email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Introduzca su correo..."  autofocus>
                                    @if($errors->first('email'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                            </div><!--email-->
                            <div class="form-group col-md-6">
                                 <label for="password">Contraseña</label>
                                    <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Introduzca su password..."  autofocus>
                                    @if($errors->first('password'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                            </div><!--contraseña-->
                            <div class="form-group col-md-6">
                                 <label for="confirmarContraseña">Confirmar contraseña</label>
                                    <input id="confirmarContraseña" type="password" class="form-control" name="confirmarContraseña" value="{{ old('confirmarContraseña') }}" placeholder="Confirme su contraseña..."  autofocus>
                                    @if (Session::has('confirmarContraseña'))
                                        <div class="alert alert-danger">{{ Session::get('confirmarContraseña') }}</div>
                                    @endif
                                    @if($errors->first('confirmarContraseña'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('confirmarContraseña') }}
                                        </div>
                                    @endif
                            </div><!--confirmarContraseña-->
                            <div class="form-group col-md-6">
                                 <label for="telefono">Telefono</label>
                                    <input id="telefono" type="tel" class="form-control" name="telefono" value="{{ old('telefono') }}" placeholder="Introduzca su telefono..."  autofocus pattern="[0-9]{9}">
                                    @if($errors->first('telefono'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('telefono') }}
                                        </div>
                                    @endif
                            </div><!--telefono-->
                            <div class="form-group  col-md-6">
                                <button type="submit" class="css-boton boton-exito">
                                    {{ __('Confirmar registro') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
