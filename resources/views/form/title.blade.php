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
    <style>
        .btn.btn-info{
            background-color: #166b91;
        }
        .card .card-header-info{
            background: linear-gradient(60deg, #166b91, #0097a7);
        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;">
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header"><h5>{{ __('Edudacion') }}</h5></div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ url('/home/form/title/'.$form->id.'') }}">
                                @csrf
                                {{ csrf_field() }}
                                <a class="btn btn-success btn-fab btn-fab-mini btn-round create-modal" style="color: white">
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
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive">
                                        <table class="table table-sm w-auto" id="tabla">
                                            <thead>
                                            <tr>
                                                <th style="width: 50%;" class="text-left">Institucion/Universidad</th>
                                                <th class="text-center">Titulo</th>
                                                <th class="text-center">Año de Titulacion</th>
                                                <th class="text-center">Grado</th>
                                                {{--<th class="text-right"> </th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($title as $titles)
                                                <tr>
                                                    <td style="width: 50%;" class="text-left">{{$titles->institucion}}</td>
                                                    <td class="text-center">{{$titles->titulo}}</td>
                                                    <td class="text-center">{{$titles->year}}</td>
                                                    @foreach($gra as $gr)
                                                        @if($titles->grade_id == $gr->id)
                                                    <td class="text-center">{{$gr->grado}}</td>
                                                        @endif
                                                    @endforeach
                                                    <td class="td-actions text-right">
                                                        <a href="{{ url('/home/titleEdit/'.$titles->id.'') }}" class="btn btn-info btn-sm" id="edit-item" rel="tooltip" style="color:rgb(255,255,255)">editar</a>
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
                                        <a href="{{url('/home/skills/'.$form->id.'')}}"  class="btn btn-info">
                                            {{ __('Atras') }}
                                        </a>
                                        <a href="{{url('/home/form/enterprise/'.$form->id.'')}}" class="btn btn-info">
                                            Siguiente
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
    <div class="modal fade" id="newtitle">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Registro de educacion</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="{{ url('/home/form/title/'.$form->id.'') }}" class="form-horizontal form-material">
                        {!! csrf_field() !!}
                        <div class="panel-body">
                            <input type="hidden" name="form_id" id="form_id" value="{{$form->id}}">

                            <div class="form-group col-md-12">
                                <label for="institucion" class="control-label">Institucion/Universidad</label>
                                <input type="text" class="form-control" id="institucion" name="institucion" maxlength="100" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="titulo" class="control-label">Titulo</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" maxlength="50" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="year" class="control-label">Año que obtuvo el titulo</label>
                                <input type="number" class="form-control" id="year" name="year" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="grade_id" class="control-label">Grado</label>
                                <select name="grade_id" class="form-control" id="grade_id">
                                    <option value="1">--Seleccione grado de estudio--</option>
                                    @foreach($gra as $gr)
                                        <option value="{{$gr->id}}">{{$gr->grado}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--</form>--}}
                        <div class="modal-footer" style="padding-bottom: 0px;padding-top: 0px;">
                            <div class="col-md-12 text-center ">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                                <button type="submit" class="btn btn-info add">
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
            $('#newtitle').modal('show');
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
