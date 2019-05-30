@extends('layouts.app')

@section('content')
    <style>
        .btn.btn-info{
            background-color: #166b91;
        }
        .card .card-header-info{
            background: linear-gradient(60deg, #166b91, #0097a7);
        }
        .form-check .form-check-input:checked+.form-check-sign .check{
            background: #0b2e13;
        }
    </style>

    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;">
<div class="container" >
    <div class="row justify-content-center" >
        <div class="col-md-12" style="height: 545px;">
            <div class="card">
                <div class="card-header" style="margin-top: -10px;"><h5>{{ __('Editar Usuario') }}</h5></div>

                <div class="card-body">
                    <form class="form-horizontal py-3" method="POST" action="{{ url('/home/edit/profile/'.$user->id.'') }}">
                        {{ csrf_field() }}
                        <div class="form-row py-3">
                            <input type="hidden" id="inpr" name="inpr" value="{{Auth::user()->id}}">

                            <div class="col-md-3">
                                <label>Nombre</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nombre" required autofocus>
                            </div>

                            <div class="col-md-3">
                                <label>Apellido Paterno</label>
                                <input id="apellido_p" type="text" class="form-control" name="apellido_p" value="{{ $user->apellido_p }}" placeholder="Apellido Paterno" required autofocus>
                            </div>
                            <div class="col-md-2">
                                <label>Apellido Materno</label>
                                <input id="apellido_m" type="text" class="form-control" name="apellido_m" value="{{ $user->apellido_m }}" placeholder="Apellido Materno" required autofocus>
                            </div>
                            <div class="col-md-2">
                                <label>Carnet de identidad</label>
                                <input id="ci" type="text" class="form-control" name="ci" value="{{ $user->ci }}" placeholder="Carnet de identidad" required autofocus>
                            </div>
                            <div class="col-md-2">
                                <label>Fecha de nacimiento</label>
                                <input id="fnacimiento" type="date" class="form-control datetimepicker" name="fnacimiento" value="{{$user->birthday }}" required autofocus>
                            </div>
                        </div>


                        <div class="form-row py-3">
                            <div class="col-md-3">
                                <label>Nacionalidad</label>
                                <input id="nacionalidad" type="text" class="form-control" name="nacionalidad" value="{{ $user->nacionalidad }}" placeholder="Nacionalidad" required autofocus>
                            </div>
                            <div class="col-md-3">
                                <label>Residencia</label>
                                <input id="residencia" type="text" class="form-control" name="residencia" value="{{ $user->residencia }}" placeholder="Ciudad de Residencia" required autofocus>
                            </div>

                            <div class="col-md-2">
                                <label>Celular</label>
                                <input id="celular" type="number" class="form-control" name="celular" value="{{ $user->celular }}" placeholder="Celular" required autofocus>
                            </div>
                            <div class="col-md-2">
                                <label>Telefono</label>
                                <input id="telefono" type="number" class="form-control" name="telefono" value="{{ $user->telefono }}" placeholder="Telefono fijo" required autofocus>
                            </div>
                            <div class="col-md-2">
                                <label>Correo electronico</label>
                                <input id="mail" type="text" class="form-control" name="mail" value="{{ $user->email }}" placeholder="mail" required autofocus>
                            </div>
                        </div>

                        <div class="form-row py-3">
                            <div class="col-md-3">
                                <label>Sexo</label>
                                <br>
                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="0" {{ $user->sexo == '0' ? 'checked' : '' }}> Mujer
                                        <span class="circle">
                                        <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo" value="1" {{ $user->sexo == '1' ? 'checked' : '' }}> Hombre
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            {{--<div class="col-md-3">--}}
                            {{--<input type="radio" name="meterial"  value="Aluminum"--}}
                                    {{--{{ $product_attribute->meterial == 'Aluminum' ? 'checked' : '' }} >--}}
                            {{--</div>--}}

                            <div class="col-md-3">
                                <label>Cantidad de hijos</label>
                                <br>
                                <input id="hijos" type="text" class="form-control" name="hijos" value="{{$user->children }}" placeholder="Tiene hijos y cuantos" autofocus>
                            </div>
                            <div class="col-md-3">
                                <label>Estado civil</label>
                                <br>
                                <select name="civil" class="form-control" id="civil">
                                    <option value=" ">-- Estado Civil --</option>
                                    @foreach($civil as $civils)
                                        <option value="{{ $civils->id}}" {{$civils->id==$user->civil ? 'selected':'' }}>{{ $civils->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label>Licencia de conducir</label>
                                <br>
                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="licencia" id="licencia" value="0" {{ $user->drivecard == '0' ? 'checked' : '' }}> No
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check form-check-radio form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="licencia" id="licencia" value="1" {{ $user->drivecard == '1' ? 'checked' : '' }}> Si
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 py-3">
                            <div class="col-md-12 text-center ">
                                <a href="{{url('/home')}}"  class="btn btn-info">
                                    {{ __('Cancelar') }}
                                </a>
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
