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
