@extends('layouts.app')
@section('content')
    <script>
        setTimeout(function () {
            $("#alert1").fadeOut();
        },3000);
    </script>
    <style>
        .btn.btn-info{
            background-color: #166b91;
        }
        .card .card-header-info{
            background: linear-gradient(60deg, #166b91, #0097a7);
        }
    </style>

    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Registro de Usuario') }}</div>
                <div class="card-body">
                    <form class="form-horizontal py-1" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        @csrf

                        <div class="form-row py-3">
                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4 ">
                                <input id="apellido_p" type="text" class="form-control{{ $errors->has('apellido_p') ? ' is-invalid' : '' }}" name="apellido_p" value="{{ old('apellido_p') }}" placeholder="Apellido Paterno" required autofocus>

                                @if ($errors->has('apellido_p'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido_p') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input id="apellido_m" type="text" class="form-control{{ $errors->has('apellido_m') ? ' is-invalid' : '' }}" name="apellido_m" value="{{ old('apellido_m') }}" placeholder="Apellido Materno" required autofocus>

                                @if ($errors->has('apellido_m'))
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('apellido_m') }}</strong>
                                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-row py-3">
                            <div class="col-md-4">
                                <input id="ci" type="text" class="form-control{{ $errors->has('ci') ? ' is-invalid' : '' }}" name="ci" value="{{ old('ci') }}" placeholder="CI" required autofocus>

                                @if ($errors->has('ci'))
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('ci') }}</strong>
                                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input id="nacionalidad" type="text" class="form-control{{ $errors->has('nacionalidad') ? ' is-invalid' : '' }}" name="nacionalidad" value="{{ old('nacionalidad') }}" placeholder="Nacionalidad" required autofocus>

                                @if ($errors->has('nacionalidad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nacionalidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input id="residencia" type="text" class="form-control{{ $errors->has('residencia') ? ' is-invalid' : '' }}" name="residencia" value="{{ old('residencia') }}" placeholder="Ciudad de Residencia" required autofocus>

                                @if ($errors->has('residencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('residencia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row py-3">

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  placeholder="Correo electronico" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
                                @if ($errors->has('password'))
                                    <span id="alert1" class="help-block">
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            {{--<div class="col-md-4">--}}
                                {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>--}}
                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required>

                                    <i class="material-icons" data-toggle="tooltip" data-placement="bottom" title="la contraseña debe tener mas de 6 caracteres">help_outline</i>
                            </div>
                        </div>

                        <div class="form-group row mb-0 py-3">
                            <div class="col-md-12 text-center ">
                                <button type="submit" class="btn btn-info">
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
