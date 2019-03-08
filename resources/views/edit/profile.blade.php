@extends('layouts.app')

@section('content')
    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Registro de Usuario') }}</div>

                <div class="card-body">
                    <form class="form-horizontal py-4" method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="form-row py-4">
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


                        <div class="form-row py-4">


                            <div class="col-md-12">
                                <input id="ci" type="text" class="form-control{{ $errors->has('ci') ? ' is-invalid' : '' }}" name="ci" value="{{ old('ci') }}" placeholder="CI" required autofocus>

                                @if ($errors->has('ci'))
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('ci') }}</strong>
                                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-row py-4">

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Mail" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                            </div>

                        </div>



                        <div class="form-group row mb-0 py-4">
                            <div class="col-md-12 text-center ">

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
