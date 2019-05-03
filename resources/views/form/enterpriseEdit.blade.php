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
                        <div class="card-header">{{ __('Editar Experiencia Laboral') }}</div>

                        <div class="card-body">
                            <form class="form-horizontal py-4" method="post" action="{{url('/home/enterpriseEdit/'.$rol->id.'')}}">
                                {{ csrf_field() }}
                                <div class="form-row py-2">
                                    <input type="text" name="idform" id="idform" value="{{$rol->form_id}}">
                                    <input type="text" name="idrol" id="idrol" value="{{$rol->id}}">
                                    <input type="text" name="ident" id="ident" value="{{$rol->enterprise_id}}">
                                    <div class="form-group col-md-3">
                                        <label for="nombre_empresa" class="control-label">Empresa</label>
                                        <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" maxlength="100" value="{{$ent->nombre_empresa}}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="cargo" class="control-label">Cargo que desempeñaba</label>
                                        <input type="text" class="form-control" id="cargo" name="cargo" maxlength="100" value="{{$ent->rol}}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="fecha_inicio" class="control-label">Fecha de Inicio</label>
                                        <input type="date" class="form-control datetimepicker" id="fecha_inicio" name="fecha_inicio" value="{{$ent->fecha_inicio}}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="fecha_fin" class="control-label">Fecha de Salida</label>
                                        <input type="date" class="form-control datetimepicker" id="fecha_fin" name="fecha_fin" value="{{$ent->fecha_fin}}" required>
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
                                        <input type="text" class="form-control" id="nombre_jefe" name="nombre_jefe" maxlength="80" value="{{$ent->nombre_jefe}}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="role" class="control-label">Cargo</label>
                                        <input type="text" class="form-control" id="role" name="role" maxlength="100" value="{{$ent->role}}" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="cel_jefe" class="control-label">Telefono</label>
                                        <input type="number" class="form-control" id="cel_jefe" name="cel_jefe" value="{{$ent->cel_jefe}}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="mail_jefe" class="control-label">Correo electronico</label>
                                        <input type="email" class="form-control" id="mail_jefe" name="mail_jefe" maxlength="100" value="{{$ent->mail_jefe}}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 py-2">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{url('/home/form/enterprise/'.$rol->form_id.'')}}" class="btn btn-primary">
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