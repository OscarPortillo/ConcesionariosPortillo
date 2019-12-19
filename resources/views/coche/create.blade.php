@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                <a href="/coche" class="css-boton boton-primario">Volver</a>
                    <h1 style="text-align: center;">Rellene los campos.</h1>
                    <form action="/coche" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="marca">Marca</label>
                                <input type="text" class="form-control" id="marca" placeholder="Marca" name="marca">
                                @if($errors->first('marca'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('marca') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="modelo">Modelo</label>
                                <input type="text" class="form-control" id="modelo" placeholder="Modelo" name="modelo">
                                @if($errors->first('modelo'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('modelo') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="precio">Precio</label>
                                <input type="text" class="form-control" id="precio" placeholder="Precio" name="precio">
                                @if($errors->first('precio'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('precio') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="año">Año</label>
                                <input type="text" class="form-control" id="año" placeholder="Año" name="año">
                                @if($errors->first('año'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('año') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="detalles">Detalles</label>
                                <input type="text" class="form-control" id="detalles" placeholder="Detalles" name="detalle">
                                @if($errors->first('detalle'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('detalle') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6">                                
                                <label for="imagen">Selecciona imagen</label>
                                <input type="file" class="form-control-file" id="imagen" placeholder="Selecciona imagen" name="imagen">
                                @if($errors->first('imagen'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('imagen') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-6 ">
                                <input type="submit" value="Crear" class="css-boton boton-exito">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
