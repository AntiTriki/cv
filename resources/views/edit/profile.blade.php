@extends('layouts.app')

@section('content')

    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-12" style="height: 545px;">
            <div class="card">
                <div class="card-header"><h5>{{ __('Editar Usuario') }}</h5></div>

                <div class="card-body">
                    <form class="form-horizontal py-4" method="POST" action="{{ route('register') }}">
                        @csrf

                        <input type="text" id="pk-usuario" name="pk-usuario" value="{{ old('pk-usuario') }}">
                        <div class="form-row py-4">
                            <div class="col-md-3">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="razon_social" name="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <input id="apellido_p" type="text" class="form-control{{ $errors->has('apellido_p') ? ' is-invalid' : '' }}" name="apellido_p" value="{{ old('apellido_p') }}" placeholder="Apellido Paterno" required autofocus>

                                @if ($errors->has('apellido_p'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido_p') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <input id="apellido_m" type="text" class="form-control{{ $errors->has('apellido_m') ? ' is-invalid' : '' }}" name="apellido_m" value="{{ old('apellido_m') }}" placeholder="Apellido Materno" required autofocus>

                                @if ($errors->has('apellido_m'))
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('apellido_m') }}</strong>
                                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <input id="ci" type="text" class="form-control{{ $errors->has('ci') ? ' is-invalid' : '' }}" name="ci" value="{{ old('ci') }}" placeholder="CI" required autofocus>

                                @if ($errors->has('ci'))
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('ci') }}</strong>
                                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <input id="fnacimiento" type="date" class="form-control datetimepicker{{ $errors->has('fnacimiento') ? ' is-invalid' : '' }}" name="fnacimiento" value="{{ old('fnacimiento') }}" required autofocus>

                                @if ($errors->has('fnacimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fnacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-row py-4">

                            <div class="col-md-3">
                                <input id="nacionalidad" type="text" class="form-control{{ $errors->has('nacionalidad') ? ' is-invalid' : '' }}" name="nacionalidad" value="{{ old('nacionalidad') }}" placeholder="Nacionalidad" required autofocus>

                                @if ($errors->has('nacionalidad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nacionalidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <input id="residencia" type="text" class="form-control{{ $errors->has('residencia') ? ' is-invalid' : '' }}" name="residencia" value="{{ old('residencia') }}" placeholder="Ciudad de Residencia" required autofocus>

                                @if ($errors->has('residencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('residencia') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                                <input id="celular" type="number" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" placeholder="Celular" required autofocus>

                                @if ($errors->has('celular'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <input id="telefono" type="number" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono') }}" placeholder="Telefono fijo" required autofocus>

                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <input id="mail" type="text" class="form-control{{ $errors->has('mail') ? ' is-invalid' : '' }}" name="mail" value="{{ old('mail') }}" placeholder="mail" required autofocus>

                                @if ($errors->has('mail'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row py-4">
                            <div class="col-md-3">
                                <label>Sexo</label>
                                <br>
                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="option1"> Mujer
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="option2"> Hombre
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input id="hijos" type="text" class="form-control{{ $errors->has('hijos') ? ' is-invalid' : '' }}" name="hijos" value="{{ old('hijos') }}" placeholder="Tiene hijos y cuantos" required autofocus>

                                @if ($errors->has('hijos'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hijos') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label>Estado Civil</label>
                                <br>
                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="civil" id="civil" value="option1"> Soltero
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="civil" id="civil" value="option2"> Casado
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label>Licencia de conducir</label>
                                <br>
                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="licencia" id="licencia" value="option1"> Si
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="licencia" id="licencia" value="option2"> No
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>





                        <div class="form-group row mb-0 py-4">
                            <div class="col-md-12 text-center ">
                                <a href="{{route('home')}}"  class="btn btn-primary">
                                    {{ __('Atrás') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
