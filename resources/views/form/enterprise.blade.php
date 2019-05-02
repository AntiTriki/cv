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
        .my-custom-scrollbar {
            position: relative;
            height: 300px;
            overflow: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;">
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header"><h5>{{ __('Experiencia Laboral') }}</h5></div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ url('/home/form/enterprise/'.$form->id.'') }}">
                                @csrf
                                {{ csrf_field() }}
                                <a class="btn btn-primary btn-fab btn-fab-mini btn-round create-modal" style="color: white">
                                    <i class="material-icons">add</i>
                                </a>
                                <div class="form-row">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive" >
                                        <table class="table table-sm w-auto" id="tabla">
                                            <thead>
                                            <tr>
                                                <th class="text-left">Empresa</th>
                                                <th class="text-center">Cargo que desempeñaba</th>
                                                <th class="text-center">Descripcion</th>
                                                <th class="text-center">Fecha de ingreso</th>
                                                <th class="text-center">Fecha de salida</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($role as $roles)
                                                <tr>
                                                    @foreach($enter as $ent)
                                                            <td class="text-left"> {{$ent->nombre_empresa}} </td>
                                                            <td class="text-left"> {{$ent->cargo}} </td>
                                                    @endforeach
                                                        <td class="text-left">{{$roles->descripcion}}</td>
                                                    @foreach($enter as $ent)
                                                        <td class="text-center"> {{ date('d-m-Y', strtotime($ent->fecha_inicio))}} </td>
                                                        <td class="text-center"> {{date('d-m-Y', strtotime($ent->fecha_fin))}} </td>
                                                    @endforeach
                                                    <td class="td-actions text-right">
                                                        <a href="{{ url('/home/titleEdit/'.$roles->id.'') }}" class="btn btn-primary btn-sm" id="edit-item" rel="tooltip" style="color:rgb(255,255,255)">editar</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    <div class="container">
                                                        <div class="alert-icon">
                                                            <i class="material-icons">error_outline</i>
                                                        </div>
                                                        <b>No tiene datos agregados</b>
                                                    </div>
                                                </div>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 py-1">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{url('/home/form/title/'.$form->id.'')}}"  class="btn btn-primary">
                                            {{ __('Atras') }}
                                        </a>
                                        <a href="{{route('home')}}" class="btn btn-primary">
                                            Finalizar
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enterprise new -->
    <div class="modal fade" id="newenter">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Registro de experiencia laboral</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="{{ url('/home/form/enterprise/'.$form->id.'') }}" class="form-horizontal form-material">
                        {!! csrf_field() !!}
                        <div class="panel-body form-row py-3">
                            <input type="hidden" name="form_id" id="form_id" value="{{$form->id}}">

                            <div class="form-group col-md-3">
                                <label for="empresa" class="control-label">Empresa</label>
                                <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" maxlength="100" value="" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="cargo" class="control-label">Cargo</label>
                                <input type="text" class="form-control" id="cargo" name="cargo" maxlength="100" value="" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="fecha" class="control-label">Fecha de Inicio</label>
                                <input type="date" class="form-control datetimepicker" id="fecha_inicio" name="fecha_inicio" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="fecha" class="control-label">Fecha de Salida</label>
                                <input type="date" class="form-control datetimepicker" id="fecha_fin" name="fecha_fin" required>
                            </div>
                        </div>
                        <hr style="border-color: #867f7f;">
                    <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Datos del jefe</h5> <br>
                        <div class="panel-body form-row py-3">
                            <div class="form-group col-md-3">
                                <label for="cargo" class="control-label">Nombre del jefe</label>
                                <input type="text" class="form-control" id="cargo" name="cargo" maxlength="100" value="" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="cargo" class="control-label">Rol del jefe</label>
                                <input type="text" class="form-control" id="cargo" name="cargo" maxlength="100" value="" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="cargo" class="control-label">Telf del jefe</label>
                                <input type="number" class="form-control" id="cargo" name="cargo" maxlength="100" value="" required>
                            </div>
                        </div>
                        </form>
                        <div class="modal-footer" style="padding-bottom: 0px;padding-top: 0px;">
                            <div class="col-md-12 text-center ">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                                <button type="submit" class="btn btn-primary add">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // add a new post
        $(document).on('click', '.create-modal', function() {
            $('#newenter').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                {{--url: "{{url('/home/skills')}}"+'/'+id,--}}
                // url: 'skills.guardar',
                data: {
                    'institucion': $('#institucion').val(),
                    'titulo': $('#titulo').val(),
                    'year': $('#year').val(),
                    'grade_id': $('#grade_id').val()
                },
                success: function(data) {
                    $('.errorTitle').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#newtitle').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.name) {
                            $('.errorTitle').removeClass('hidden');
                            $('.errorTitle').text(data.errors.name);

                        }
                    }else {
                        toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                        $('#tabla').append("<tr><td>" + data.name + "</td><td>" + data.nivel + "</td></tr>");
                    }
                }
            });
        });
    </script>
@endsection
