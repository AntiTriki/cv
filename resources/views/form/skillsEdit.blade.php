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
                        <div class="card-header">{{ __('Editar') }}</div>

                        <div class="card-body">
                            <form class="form-horizontal py-4" method="post" action="{{url('/home/skillsEdit/'.$level->id.'')}}">
                                {{ csrf_field() }}
                                <div class="form-row py-2">
                                    <input type="text" name="form_id" id="form_id" value="{{$level->id}}">

                                    <input type="text" name="idskill" id="idskill" value="{{$level->skill_id}}">
                                    <div class="form-group col-md-12">
                                        <label for="name" class="control-label">Nombre</label>
                                        @foreach($sk as $skk)
                                        @if($level->skill_id == $skk->id)
                                        <input type="text" class="form-control" id="name" name="name" maxlength="50" value="{{$skk->name}}" required>
                                            @endif
                                            @endforeach
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="name" class="control-label">Nivel</label>
                                        <select name="nivel" class="form-control" id="nivel">
                                            {{--<option value="1">--Seleccione Nivel--</option>--}}
                                            @foreach($Nivel as $Nivels)
                                                <option value="{{$Nivels->id}}" {{$Nivels->id==$level->nombre_id ? 'selected':'' }}>{{$Nivels->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 py-2">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{url('/home/skills/'.$level->form_id.'')}}" class="btn btn-primary">
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

    <!-- Skills edit -->
    {{--<div class="modal fade" id="linkEditorModal">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                    {{--<h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Editar Registro de Conocimientos y habilidades</h5>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<form id="modalFormData" name="modalFormData" class="form-horizontal form-material">--}}
                        {{--{!! csrf_field() !!}--}}
                        {{--<div class="panel-body">--}}
                            {{--<input type="text" name="form_id" id="form_id" >--}}

                            {{--<div class="form-group col-md-12">--}}
                                {{--<label for="name" class="control-label">Nombre</label>--}}
                                {{--<input type="text" class="form-control" id="Name" name="Name" maxlength="50" required>--}}
                            {{--</div>--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label for="name" class="control-label">Nivel</label>--}}
                                {{--<select name="Nivel" class="form-control" id="Nivel">--}}
                                    {{--<option value="1">--Seleccione Nivel--</option>--}}
                                    {{--@foreach($Nivel as $Nivels)--}}
                                        {{--<option value="{{$Nivels->id}}">{{$Nivels->nombre}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--</form>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<div class="col-md-12 text-center ">--}}
                                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>--}}
                                {{--<button type="button" class="btn btn-primary" id="btn-save" value="add">Guardar</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection