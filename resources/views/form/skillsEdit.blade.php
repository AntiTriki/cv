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
                        <div class="card-header">{{ __('Editar Conocimientos y habilidades') }}</div>

                        <div class="card-body">
                            <form class="form-horizontal py-4" method="post" action="{{url('/home/skillsEdit/'.$level->id.'')}}">
                                {{ csrf_field() }}
                                <div class="form-row py-2">
                                    <input type="hidden" name="form_id" id="form_id" value="{{$level->id}}">
                                    <input type="hidden" name="idskill" id="idskill" value="{{$level->skill_id}}">
                                    <input type="hidden" name="idform" id="idform" value="{{$level->form_id}}">
                                    <div class="form-group col-md-12">
                                        <label for="name" class="control-label">Nombre</label>
                                        @foreach($sk as $skk)
                                        @if($level->skill_id == $skk->id)
                                        <input type="text" class="form-control" id="name" name="name" maxlength="50" value="{{$skk->name}}" {{$skk->id <= 5 ? 'disabled':''}} required>
                                            @endif
                                            @endforeach
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="name" class="control-label">Nivel</label>
                                        <select name="nivel" class="form-control" id="nivel">
                                            <option value="1">--Seleccione Nivel--</option>
                                            @foreach($Nivel as $Nivels)
                                                <option value="{{$Nivels->id}}" {{$Nivels->id==$level->nombre_id ? 'selected':'' }}>{{$Nivels->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 py-2">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{url('/home/skills/'.$level->form_id.'')}}" class="btn btn-info">
                                            {{ __('Cancelar') }}
                                        </a>
                                        <button type="submit" class="btn btn-info">
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