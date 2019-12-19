@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" name="frm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dni">DNI</label>
                                <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}" placeholder="Introduce nº DNI"  autofocus>
 
                                <span class="invalid-feedback errorDNI" role="alert">
                                    <strong>{{ $errors->first('dni') }}</strong>
                                </span> 
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nombre" >Nombre</label>
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" placeholder="Introduzca su nombre..."  autofocus>

                                @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="apellido">{{ __('Apellido') }}</label>
                                <input id="apellido" type="text" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{ old('apellido') }}" placeholder="Introzca su apellido..."  autofocus>

                                @if ($errors->has('apellido'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="direccion">{{ __('Direccion') }}</label>
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" placeholder="Introzca su direccion..."  autofocus>
                                @if ($errors->has('direccion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">{{ __('Correo') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Introduzca su correo electrónico..." >
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password">{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Introduzca su contraseña..." >

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password-confirm">{{ __('Confirma contraseña') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme su contraseña..." >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="telefono">{{ __('Telefono') }}</label>
                                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" placeholder="Introduzca su número de telefono..." autofocus>
                                @if ($errors->has('telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group  col-md-6">
                                <button type="submit" class="btn btn-primary registrarse">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
