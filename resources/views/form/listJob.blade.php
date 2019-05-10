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
        .btn.btn-info{
            background-color: #166b91;
        }
        .card .card-header-info{
            background: linear-gradient(60deg, #166b91, #0097a7);
        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;">
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h5>{{ __('Listado de trabajos') }}</h5></div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="">
                                @csrf
                                {{ csrf_field() }}
                                <a class="btn btn-success btn-fab btn-fab-mini btn-round create-modal" style="color: white">
                                    <i class="material-icons">add</i>
                                </a>
                                <div class="form-row">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive" >
                                        <table class="table table-sm w-auto" id="tabla">
                                            <thead>
                                            <tr>
                                                <th class="text-left">Cargo</th>
                                                <th class="text-center">Categoria</th>
                                                <th class="text-center">Ciudad</th>
                                                <th class="text-center">Tipo Contrato</th>
                                                <th class="text-center">Valido</th>
                                                <th class="text-center"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($job as $jo)
                                                <tr>
                                                    <td class="text-left" style="width: 20%"> {{$jo->occupation}}</td>
                                                    <td class="text-left"> {{$jo->category_id}}</td>
                                                    <td class="text-left" style="width: 20%">{{$jo->city}}</td>
                                                    <td class="text-center"> {{$jo->time_job}} </td>
                                                    <td class="text-center"> {{date('d-m-Y', strtotime($jo->validity))}} </td>
                                                    <td class="td-actions text-right">
                                                        <a href="" class="btn btn-info btn-fab btn-fab-mini" id="edit-item" rel="tooltip" style="color:rgb(255,255,255)"><i class="material-icons">edit</i></a>
                                                        <a href="" class="btn btn-danger btn-fab btn-fab-mini" id="edit-item" rel="tooltip" style="color:rgb(255,255,255)"><i class="material-icons">delete_outline</i></a>
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
                                        <a href="{{url('/homeAdm')}}"  class="btn btn-info">
                                            {{ __('Atras') }}
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
    <!-- Skills new -->
    <div class="modal fade" id="newjob">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Registro de Conocimientos y habilidades</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="" class="form-horizontal form-material">
                        {!! csrf_field() !!}
                        <div class="panel-body">
                            <input type="hidden" name="form_id" id="form_id" value="">

                            <div class="form-group col-md-12">
                                <label for="name" class="control-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" maxlength="50" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label">Nivel</label>

                            </div>
                        </div>
                        {{--</form>--}}
                        <div class="modal-footer">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-info add">Guardar</button>
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
            $('#newjob').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                {{--url: "{{url('/home/skills')}}"+'/'+id,--}}
                // url: 'skills.guardar',
                data: {
                    'nombre_empresa': $('#nombre_empresa').val(),
                    'nombre_jefe': $('#nombre_jefe').val(),
                    'role': $('#role').val(),
                    'mail_jefe': $('#mail_jefe').val(),
                    'cargo': $('#cargo').val(),
                    'cel_jefe': $('#cel_jefe').val(),
                    'fecha_inicio': $('#fecha_inicio').val(),
                    'fecha_fin': $('#fecha_fin').val(),
                    'form_id': $('#form_id').val(),
                    'descripcion': $('#descripcion').val()
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
