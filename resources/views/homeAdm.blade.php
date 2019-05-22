@extends('layouts.app')
@section('body-class','profile-page')
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
            height: 450px;
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
    <style>
        .btn.btn-info{
            background-color: #166b91;
        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <div class="page-header header-filter" data-parallax="true" style="background-image: url({{url('img/HP_background.jpg')}});"></div>
    <div class="main main-raised">
        <div class="profile-content">

            <div class="container-fluid">
                <div class="row content">
                    <div class="col-sm-6 sidenav">
                        <br>
                        <div class="card">
                            <div class="card-header card-header-text card-header-info">
                                <div class="card-text"><h4 class="card-title text-center">Listado de trabajos</h4></div></div>
                            <div class="card-body">
                                <form class="form-horizontal" method="POST" action="">
                                    @csrf
                                    {{ csrf_field() }}
                                    <a class="btn btn-success btn-fab btn-fab-mini btn-round create-modals" style="color: white">
                                        <i class="material-icons">add</i>
                                    </a>

                                    {{-----------------------alerta---------------------}}
                                    <script>
                                                @if(Session::has('message'))
                                        var type = "{{ Session::get('alert-type', 'info') }}";
                                        switch(type){
                                            case 'info':
                                                toastr.info("{{ Session::get('message') }}");
                                                break;

                                            case 'warning':
                                                toastr.warning("{{ Session::get('message') }}");
                                                break;

                                            case 'success':
                                                toastr.success("{{ Session::get('message') }}");
                                                break;

                                            case 'error':
                                                toastr.error("{{ Session::get('message') }}");
                                                break;
                                        }
                                        @endif
                                    </script>
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
                                                    <th class="text-center" style="width: 20%"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse ($jo as $job)
                                                    <tr>
                                                        <td class="text-left" style="width: 20%"> {{$job->occupation}}</td>
                                                        @foreach($cat as $ca)
                                                            @if($job->category_id == $ca->id)
                                                                <td class="text-center"> {{$ca->name}}</td>
                                                            @endif
                                                        @endforeach
                                                        <td class="text-center" style="width: 20%">{{$job->city}}</td>
                                                        <td class="text-center"> {{$job->time_job}} </td>
                                                        <td class="text-center"> {{date('d-m-Y', strtotime($job->validity))}} </td>
                                                        <td class="td-actions text-right">
                                                            <a href="{{url('/home/form/jobEdit/'.$job->id.'')}}" class="btn btn-info btn-fab btn-fab-mini" id="edit-item" rel="tooltip" style="color:rgb(255,255,255)" title="Editar"><i class="material-icons">edit</i></a>
                                                            <a href="{{url('/home/form/jobEdit/'.$job->id.'/delete')}}" class="btn btn-danger btn-fab btn-fab-mini" style="color:rgb(255,255,255)" title="Eliminar" data-confirm="¿Esta seguro que quiere borrar?"><i class="material-icons">delete_outline</i></a>
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
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <br>
                        <div class="card">
                            <div class="card-header card-header-text card-header-info">
                                <div class="card-text"><h4 class="card-title text-center">Listado de postulantes</h4></div></div>
                            <div class="card-body">
                                <form class="form-horizontal" method="POST" action="">
                                    @csrf
                                    {{ csrf_field() }}

                                    <div class="form-row">
                                        <div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive" >
                                            <table class="table table-sm w-auto" id="tabla">
                                                <thead>
                                                <tr>
                                                    <th class="text-left" style="width: 30%">Nombre</th>
                                                    <th class="text-left" style="width: 30%">Titulo CV</th>
                                                    <th class="text-center">Cargo a postular</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse ($pos as $po)
                                                    <tr>
                                                        @foreach($for as $cvs)
                                                            @if($cvs->id == $po->form_id )

                                                                @foreach($use as $user)
                                                                    @if($cvs->user_id == $user->id )
                                                                        <td class="text-left" style="width: 30%">{{$user->name}} {{$user->apellido_p}} {{$user->apellido_m}}</td>
                                                                    @endif
                                                                @endforeach
                                                                {{--<td class="text-left" style="width: 30%"> </td>--}}

                                                                <td class="text-left" style="width: 30%">{{$cvs->general}}</td>

                                                            @endif
                                                        @endforeach
                                                        @foreach($jo as $job)
                                                            @if($job->id == $po->jobs_id)
                                                                <td class="text-center" style="width: 40%">{{$job->occupation}}</td>                                                            @endif
                                                        @endforeach
                                                        <td class="td-actions text-right">
                                                            <a href="{{url('/home/form/postulant/'.$po->id.'')}}" target="_blank" class="btn btn-info btn-fab btn-fab-mini" id="edit-item" rel="tooltip" style="color:rgb(255,255,255)" title="Ver CV"><i class="material-icons">description</i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <div class="alert alert-danger">
                                                        <div class="container">
                                                            <div class="alert-icon">
                                                                <i class="material-icons">error_outline</i>
                                                            </div>
                                                            <b>No hay postulantes vigentes</b>
                                                        </div>
                                                    </div>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--******************Modal elimina******************************-->
    <script>
        $(document).ready(function() {
            $('a[data-confirm]').click(function(ev) {
                var href = $(this).attr('href');
                if (!$('#dataConfirmModal').length) {
                    $('body').append('<div class="modal fade in" id="dataConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;">' +
                        '<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="modal-title" id="myModalLabel" style="margin-right: 150px;">Advertencia</h4></div><div class="modal-body"></div><div class="modal-footer">' +
                        '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button><a class="btn btn-primary" id="dataConfirmOK">Borrar</a></div>' +
                        '</div></div></div>');
                }
                $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
                $('#dataConfirmOK').attr('href', href);
                $('#dataConfirmModal').modal({show:true});
                return false;
            });
        });
    </script>
    <!--******************Fin Modal elimina-->
    <!-- job new -->
    <div class="modal fade" id="newjob">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Agregar oferta de trabajo</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="" class="form-horizontal form-material">
                        {!! csrf_field() !!}
                        <div class="panel-body form-row py-2">
                            {{--<input type="hidden" name="form_id" id="form_id" value="{{$form->id}}">--}}

                            <div class="form-group col-md-4">
                                <label for="occupation" class="control-label">Cargo</label>
                                <input type="text" class="form-control" id="occupation" name="occupation" maxlength="100" value="" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="category" class="control-label">Categoria</label>
                                <select name="category_id" class="form-control" id="category_id">
                                    <option value="1">--Seleccione Categoria--</option>
                                    @foreach($cat as $ca)
                                        <option value="{{$ca->id}}">{{$ca->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ciudad" class="control-label">Ciudad</label>
                                <input type="text" class="form-control" id="city" name="city" maxlength="50" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="contrato" class="control-label">Tipo de contrato</label>
                                <input type="text" class="form-control" id="time_job" name="time_job" maxlength="50" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="published" class="control-label">Publicado desde</label>
                                <input type="date" class="form-control datetimepicker" id="published" name="published" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="valido" class="control-label">Valido hasta</label>
                                <input type="date" class="form-control datetimepicker" id="validity" name="validity" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="roles" class="control-label">Funciones</label>
                                <textarea type="text" class="form-control" id="roles" name="roles" maxlength="190" value="" required></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="descripcion" class="control-label">Descripcion</label>
                                <textarea type="text" class="form-control" id="descripcion" name="description" maxlength="190" value="" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding-bottom: 0px;padding-top: 0px;">
                            <div class="col-md-12 text-center ">
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
        $(document).on('click', '.create-modals', function() {
            $('#newjob').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                data: {
                    'occupation': $('#occupation').val(),
                    'category_id': $('#category_id').val(),
                    'city': $('#city').val(),
                    'time_job': $('#time_job').val(),
                    'published': $('#published').val(),
                    'validity': $('#validity').val(),
                    'roles': $('#roles').val(),
                    'description': $('#description').val()
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

    <footer class="footer footer-default">
        <div class="container">
            <nav class="float-left">

            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by HP

            </div>
        </div>
    </footer>
@endsection
