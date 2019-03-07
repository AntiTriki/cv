@extends('layout.app')
@section('css')
    <style>
        .loading {
            background: lightgrey;
            padding: 15px;
            position: fixed;
            border-radius: 4px;
            left: 50%;
            top: 50%;
            text-align: center;
            margin: -40px 0 0 -50px;
            z-index: 2000;
            display: none;
        }

        a, a:hover {
            color: white;
        }

        .form-group.required label:after {
            content: " *";
            color: red;
            font-weight: bold;
        }
        input[id="delete_id"] {
            display: none;
        }
    </style>
@endsection
@section('content')
<<<<<<< HEAD
    <style>
        ::-webkit-input-placeholder {
            text-align: center;
        }

        :-moz-placeholder { /* Firefox 18- */
            text-align: center;
        }

        ::-moz-placeholder {  /* Firefox 19+ */
            text-align: center;
        }

        :-ms-input-placeholder {
            text-align: center;
        }
    </style>
    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{ __('Curriculum') }}</div>

                        <div class="card-body">
                            <form class="form-horizontal py-4" method="POST" action="{{ route('register_cv') }}">
                                @csrf
                                <div class="form-row py-4">


                                    <div class="col-md-12">
                                        <input id="general" type="text" class="form-control{{ $errors->has('general') ? ' is-invalid' : '' }}" name="general" value="{{ old('general') }}" placeholder="Titulo" required autofocus>

                                        @if ($errors->has('general'))
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('general') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row py-4">


                                    <div class="col-md-12">

                                    <textarea class="form-control" placeholder="Descripción de ti" name="description" id="description" rows=2></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 py-4">
                                        <div class="form-check">
                                            <label class="form-check-label">

                                                Disponibilidad inmediata
                                                <input class="form-check-input" value="0" type="hidden" name="available_job" id="available_job" >
                                                <input class="form-check-input" value="1" type="checkbox" name="available_job" id="available_job" >
                                                <span class="form-check-sign">
              <span class="check"></span>
          </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-4 py-4">
                                        <div class="form-check">
                                            <label class="form-check-label">

                                                Disponibilidad de viaje
                                                <input class="form-check-input" value="0" type="hidden" name="travel" id="travel">
                                                <input class="form-check-input" value="1" type="checkbox" name="travel" id="travel">
                                                <span class="form-check-sign">
              <span class="check"></span>
          </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 py-4">
                                        <input id="salary" type="number" class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}" name="salary" value="{{ old('salary') }}" placeholder="Pretensión Salarial" required autofocus>

                                        @if ($errors->has('salary'))
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('salary') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row mb-0 py-4">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{route('home')}}"  class="btn btn-primary">
                                            {{ __('Atrás') }}
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Siguiente') }}
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

    <script>

    </script>
@endsection
=======
<div class="container">
    {!!Form::open()!!}
    {!!Form::fieldsetOpen('Registro')!!}
    {!!Form::text('nombre', 'Nombre')->placeholder('Tu nombre')->sm()!!}
    {!!Form::text('apellido_p', 'Apellido Paterno')->placeholder('Tu apellido paterno')->sm()!!}
    {!!Form::text('apellido_m', 'Apellido Materno')->placeholder('Tu apellido materno')->sm()!!}
    {!!Form::text('ci', 'Carnet de Identidad')->placeholder('Tu Carnet')->sm()!!}
    {!!Form::text('mail', 'Correo')->placeholder('Tu Correo')->sm()!!}
    {!!Form::select('sexo', 'Género', [1 => 'Masculino', 0 => 'Femenino'])!!}
    {!!Form::text('drivecard', 'Licencia de Conducir')->placeholder('Tu Nro. de Licencia')->sm()!!}
    {!!Form::text('telefono', 'Teléfono')->type('number')->placeholder('Tu teléfono')->sm()!!}
    {!!Form::text('celular', 'Celular')->type('number')->placeholder('Tu celular')->sm()!!}
    {!!Form::text('children', 'Cantidad de Hijos')->type('number')->placeholder('Ninguno')->sm()!!}
    {!!Form::select('civil', 'Estado Civil', [1 => 'Soltero(a)', 2 => 'Casado(a)', 3 => 'Viudo(a)', 4 => 'Divorciado(a)'])!!}





{!!Form::fieldsetClose()!!}
    {!!Form::close()!!}
</div>
@endsection
@section('js')


@endsection
>>>>>>> parent of 6a2393a... we quitando cosas falta form
