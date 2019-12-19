@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Estimad@ {{$user->nombre}} usted está comprando un {{$coche->marca}} {{$coche->modelo}}.</div>
                <div class="card-body">
                    <div class="alert alert-primary">Por favor suba los documentos necesarios.</div>
                    <form action="/ventas" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dni_cliente">Selecciona dni:</label>
                                <input type="file" class="form-control-file" id="dni_cliente" name="dni_cliente" accept=".doc,.docx,.pdf">
                                @if (Session::has('ErrorCliente'))
                                        <div class="alert alert-danger">{{ Session::get('ErrorCliente') }}</div>
                                    @endif
                            </div>
                            <input type="text" class="form-control" id="bastidorCoche" name="bastidorCoche" value="{{$coche->numeroBastidor}}" hidden="">
                            <input type="text" class="form-control" id="idCoche" name="idCoche" value="{{$coche->id}}" hidden="">
                            @if($errors->first('bastidorCoche'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('bastidorCoche') }}
                                </div>
                            @endif

                            <div class="form-group col-md-6">
                                <label for="renta">Selecciona renta:</label>
                                <input type="file" class="form-control-file" id="renta" name="renta" accept=".doc,.docx,.pdf">
                                @if (Session::has('ErrorRenta'))
                                        <div class="alert alert-danger">{{ Session::get('ErrorRenta') }}</div>
                                    @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="carneConducir">Selecciona carné de conducir:</label>
                                <input type="file" class="form-control-file" id="carneConducir" name="carneConducir" accept=".doc,.docx,.pdf">
                                @if (Session::has('ErrorLicencia'))
                                    <div class="alert alert-danger">{{ Session::get('ErrorLicencia') }}</div>
                                @endif
                            </div>
                            <input type="text" value="Pendiente" class="form-control-file" id="estado" name="estado" hidden>
                            @if($errors->first('numeroBastidor'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('numeroBastidor') }}
                                </div>
                            @endif
                            <div class="form-group  col-md-6">
                                <button type="submit" class="css-boton boton-error">
                                    {{ __('Confirmar compra') }}
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
