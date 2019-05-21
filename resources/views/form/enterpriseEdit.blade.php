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
                        <div class="card-header">{{ __('Editar Experiencia Laboral') }}</div>

                        <div class="card-body">
                            <form class="form-horizontal py-2" method="post" action="{{url('/home/form/enterpriseEdit/'.$rol->id.'')}}">
                                {{ csrf_field() }}
                                <div class="form-row py-2">
                                    <input type="hidden" name="idform" id="idform" value="{{$rol->form_id}}">
                                    <input type="hidden" name="idrol" id="idrol" value="{{$rol->id}}">
                                    <input type="hidden" name="ident" id="ident" value="{{$rol->enterprise_id}}">
                                    <div class="form-group col-md-3">
                                        <label for="nombre_empresa" class="control-label">Empresa</label>
                                        @foreach($ent as $en)
                                            @if($rol->enterprise_id == $en->id)
                                        <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" maxlength="100" value="{{$en->nombre_empresa}}" required>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="cargo" class="control-label">Cargo que desempeñaba</label>
                                        @foreach($ent as $en)
                                            @if($rol->enterprise_id == $en->id)
                                                <input type="text" class="form-control" id="cargo" name="cargo" maxlength="100" value="{{$en->cargo}}" required>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="fecha_inicio" class="control-label">Fecha de Inicio</label>
                                        @foreach($ent as $en)
                                            @if($rol->enterprise_id == $en->id)
                                                <input type="date" class="form-control datetimepicker" id="fecha_inicio" name="fecha_inicio" value="{{$en->fecha_inicio}}" required>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="fecha_fin" class="control-label">Fecha de Salida</label>
                                        @foreach($ent as $en)
                                            @if($rol->enterprise_id == $en->id)
                                                <input type="date" class="form-control datetimepicker" id="fecha_fin" name="fecha_fin" value="{{$en->fecha_fin}}" required>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="descripcion" class="control-label">Descripcion</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="2" maxlength="190">{{$rol->descripcion}}</textarea>
                                    </div>
                                </div>
                                <hr style="border-color: #867f7f;">
                                <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Datos del anterior jefe</h5> <br>
                                <div class="panel-body form-row py-2">
                                    <div class="form-group col-md-4">
                                        <label for="nombre_jefe" class="control-label">Nombre completo</label>
                                        @foreach($ent as $en)
                                            @if($rol->enterprise_id == $en->id)
                                                <input type="text" class="form-control" id="nombre_jefe" name="nombre_jefe" maxlength="80" value="{{$en->nombre_jefe}}">
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="role" class="control-label">Cargo</label>
                                        @foreach($ent as $en)
                                            @if($rol->enterprise_id == $en->id)
                                                <input type="text" class="form-control" id="role" name="role" maxlength="100" value="{{$en->role}}">
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="cel_jefe" class="control-label">Telefono</label>
                                        @foreach($ent as $en)
                                            @if($rol->enterprise_id == $en->id)
                                                <input type="number" class="form-control" id="cel_jefe" name="cel_jefe" value="{{$en->cel_jefe}}">
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="mail_jefe" class="control-label">Correo electronico</label>
                                        @foreach($ent as $en)
                                            @if($rol->enterprise_id == $en->id)
                                                <input type="email" class="form-control" id="mail_jefe" name="mail_jefe" maxlength="100" value="{{$en->mail_jefe}}">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group row mb-0 py-2">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{url('/home/form/enterprise/'.$rol->form_id.'')}}" class="btn btn-info">
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