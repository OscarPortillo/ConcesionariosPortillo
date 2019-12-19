@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card">
            
                <div class="card-header">{{ __('Editando al Coche: ') }}{{$coche->marca}} {{$coche->modelo}}</div>
                <div class="card-body">
                <a href="/coche" class="btn btn-primary">Atrás</a>
                     <form method="post" action="/coche/{{ $coche->id }}" name="frm" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$coche->id}}">
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                 <label for="numeroBastidor">Nº de Bastidor</label>
                                 <input id="numeroBastidor" type="hidden" class="form-control" name="numeroBastidor" value="{{ old('numeroBastidor') ? old('numeroBastidor') : $coche->numeroBastidor }}">
                                    <input id="numeroBastidor" type="text" class="form-control" name="numeroBastidor" value="{{ old('numeroBastidor') ? old('numeroBastidor') : $coche->numeroBastidor }}" disabled>
                                    @if($errors->first('numeroBastidor'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('numeroBastidor') }}
                                        </div>
                                    @endif
                            </div><!--numeroBastidor-->

                            <div class="form-group col-md-6">
                                 <label for="marca">Marca</label>
                                    <input id="marca" type="text" class="form-control" name="marca" value="{{ old('marca') ? old('marca') : $coche->marca }}" autofocus>
                                    @if($errors->first('marca'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('marca') }}
                                        </div>
                                    @endif
                            </div><!--marca-->

                            <div class="form-group col-md-6">
                                 <label for="modelo">Modelo</label>
                                    <input id="modelo" type="text" class="form-control" name="modelo" value="{{ old('modelo') ? old('modelo') : $coche->modelo }}" autofocus>
                                    @if($errors->first('modelo'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('modelo') }}
                                        </div>
                                    @endif
                            </div><!--modelo-->

                            <div class="form-group col-md-6">
                                 <label for="precio">Precio</label>
                                    <input id="precio" type="text" class="form-control" name="precio" value="{{ old('precio') ? old('precio') : $coche->precio }}" autofocus>
                                    @if($errors->first('precio'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('precio') }}
                                        </div>
                                    @endif
                            </div><!--precio-->

                            <div class="form-group col-md-6">
                                 <label for="año">Año</label>
                                    <input id="año" type="text" class="form-control" name="año" value="{{ old('año') ? old('año') : $coche->año }}" autofocus>
                                    @if($errors->first('año'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('año') }}
                                        </div>
                                    @endif
                            </div><!--año-->

                            <div class="form-group col-md-6">
                                 <label for="detalle">detalle</label>
                                    <input id="detalle" type="text" class="form-control" name="detalle" value="{{ old('detalle') ? old('detalle') : $coche->detalle }}" autofocus>
                                    @if($errors->first('detalle'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('detalle') }}
                                        </div>
                                    @endif
                            </div><!--detalle-->

                            <div class="form-group col-md-12">
                                <input id="imagenVieja" type="hidden" class="form-control" name="imagenVieja" value="{{ old('imagen') ? old('imagen') : $coche->imagen }}">
                                <label for="imagen">Selecciona imagen</label>
                                <input type="file" class="form-control-file" id="imagen" placeholder="Selecciona imagen" name="imagen">
                                @if($errors->first('imagen'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('imagen') }}
                                    </div>
                                @endif
                            </div><!--imagen-->

                            <div class="form-group  col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Terminar edición') }}
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
