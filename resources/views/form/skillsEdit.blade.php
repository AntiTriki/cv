<!-- *************Edit******************************** -->

{{--<!-- Skills edit -->--}}
{{--<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
                {{--<h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Editar Registro de--}}
                    {{--Conocimientos y habilidades</h5>--}}
            {{--</div>--}}
            {{--<form action="{{url('/home/skillsEdit/'.$level->id.'')}}" method="post" class="form-horizontal form-material">--}}
            {{--<div class="modal-body">--}}

                    {{--{!! csrf_field() !!}--}}
                    {{--{{method_field('patch')}}--}}
                    {{--<div class="panel-body">--}}
                        {{--<input type="hidden" name="form_id" id="form_id" value="{{$level->id}}">--}}
                        {{--<input type="hidden" name="idskill" id="idskill" value="{{$level->skill_id}}">--}}
                        {{--<input type="hidden" name="idform" id="idform" value="{{$level->form_id}}">--}}
                        {{--<div class="form-group col-md-12">--}}
                            {{--<label for="name" class="control-label">Nombre</label>--}}
                            {{--@foreach($sk as $skk)--}}
                                {{--@if($level->skill_id == $skk->id)--}}
                                    {{--<input type="text" class="form-control" id="name" name="name" maxlength="50"--}}
                                           {{--value="{{$skk->name}}" {{$skk->id <= 5 ? 'disabled':''}} required>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                        {{--<div class="form-group col-md-12">--}}
                            {{--<label for="name" class="control-label">Nivel</label>--}}
                            {{--<select name="nivel" class="form-control" id="nivel">--}}
                                {{--<option value="1">--Seleccione Nivel--</option>--}}
                                {{--@foreach($Nivel as $Nivels)--}}
                                    {{--<option value="{{$Nivels->id}}" {{$Nivels->id==$level->nombre_id ? 'selected':'' }}>{{$Nivels->nombre}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<div class="col-md-12 text-center ">--}}
                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>--}}
                        {{--<button type="button" class="btn btn-primary" id="btn-save" value="add">Guardar</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}



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