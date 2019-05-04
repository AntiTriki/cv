@extends('layouts.app')

@section('content')
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
                        <div class="card-header"><h5>{{ __('Curriculum') }}</h5></div>

                        <div class="card-body">
                            <form class="form-horizontal py-4" method="POST" action="{{ url('/home/form/index/'.$form->id.'') }}">
                                {{ csrf_field() }}
                                <div class="form-row py-2">
                                    <div class="col-md-12">
                                        <input id="general" type="text" value="{{ $form->general }}" class="form-control" name="general" placeholder="Titulo Ej: Ejecutivo de ventas Scz" required autofocus>
                                    </div>
                                </div>

                                <div class="form-row py-4">
                                    <div class="col-md-12">
                                    <textarea class="form-control" placeholder="Descripción/Presentacion de ti" name="description" id="description" rows=2>{{ $form->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 py-2">
                                        <input id="available_job" type="text" class="form-control" name="available_job" value="{{ $form->available_job }}" placeholder="Disponibilidad inmediata Ej: 1 semana" required autofocus>
                                    </div>
                                    <div class="col-md-4 py-2">
                                        <input id="salary" type="number" class="form-control" name="salary" value="{{ $form->salary }}" placeholder="Pretensión Salarial *" required autofocus>
                                    </div>
                                    <div class="col-md-4 py-1">
                                        <label>Disponibilidad de viaje</label><br>
                                        <div class="form-check form-check-radio form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="travel" id="travel" value="0" {{ $form->travel == '0' ? 'checked' : '' }}> No
                                                <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                            </label>
                                        </div>

                                        <div class="form-check form-check-radio form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="travel" id="travel" value="1" {{ $form->travel == '1' ? 'checked' : '' }}> Si
                                                <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0 py-2">
                                    <div class="col-md-12 text-center ">
                                        {{--<a href="{{route('/home/edit/profile/'.$usua->id.'')}}"  class="btn btn-primary">--}}
                                            {{--{{ __('Atrás') }}--}}
                                        {{--</a>--}}
                                        <a href="{{url('/home/edit/profile/'.Auth::user()->id.'')}}"  class="btn btn-info">
                                            {{ __('Cancelar') }}
                                        </a>
                                        <button type="submit" class="btn btn-info">
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

@endsection
