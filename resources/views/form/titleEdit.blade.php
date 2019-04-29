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
                        <div class="card-header">{{ __('Editar Educacion') }}</div>

                        <div class="card-body">
                            <form class="form-horizontal py-4" method="post" action="{{url('/home/titleEdit/'.$title->id.'')}}">
                                {{ csrf_field() }}
                                <div class="form-row py-2">
                                    <input type="hidden" name="idform" id="idform" value="{{$title->form_id}}">
                                    <input type="hidden" name="idtitle" id="idtitle" value="{{$title->id}}">
                                    <div class="form-group col-md-12">
                                        <label for="institucion" class="control-label">Institucion/Universidad</label>
                                            <input type="text" class="form-control" id="institucion" name="institucion" maxlength="190" value="{{$title->institucion}}" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="titulo" class="control-label">Titulo</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo" maxlength="190" value="{{$title->titulo}}" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="year" class="control-label">Año que obtuvo el titulo</label>
                                        <input type="number" class="form-control" id="year" name="year" value="{{$title->year}}" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="grade_id" class="control-label">Grado</label>
                                        <select name="grade_id" class="form-control" id="grade_id">
                                            <option value="1">--Seleccione grado de estudio--</option>
                                            @foreach($gra as $gr)
                                                <option value="{{$gr->id}}" {{$gr->id==$title->grade_id ? 'selected':'' }}>{{$gr->grado}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 py-2">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{url('/home/form/title/'.$title->form_id.'')}}" class="btn btn-primary">
                                            {{ __('Cancelar') }}
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Guardar') }}
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