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
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">{{ __('Agregar requisitos') }}</div>

                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action=" ">
                                @csrf
                                {{ csrf_field() }}
                                <a  class="btn btn-success btn-fab btn-fab-mini btn-round create-modals" style="color: white">
                                    <i class="material-icons">add</i>
                                </a>
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
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                        <table class="table table-sm" id="tabla">
                                            <thead>
                                            <tr>
                                                <th class="text-left">Nombre</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($reqi as $res)
                                                <tr>
                                                    <td>{{$res->name}}</td>
                                                    <td class="td-actions text-right">
                                                        <a href="{{url('/home/form/requirementsEdit/'.$res->id.'')}}" class="btn btn-info btn-fab btn-fab-mini" id="edit-item" rel="tooltip" style="color:rgb(255,255,255)" title="Editar"><i class="material-icons">edit</i></a>
                                                        <a href="{{url('/home/form/requirements/'.$res->id.'/delete')}}" class="btn btn-danger btn-fab btn-fab-mini" style="color:rgb(255,255,255)" data-confirm="¿Esta seguro que quiere borrar?" title="Eliminar"><i class="material-icons">delete_outline</i></a>
                                                        {{--<a class="btn btn-danger fa fa-trash-o" href="periodo/{{$periodo->pk_periodo}}/delete" data-confirm="¿Esta seguro que quiere borrar periodo {{$periodo->Nombre}}?"></a>--}}
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger" role="alert">No agrego requisitos</div>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 py-1">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{url('/home/form/jobEdit/'.$job->id.'')}}"  class="btn btn-info">
                                            {{ __('Atras') }}
                                        </a>
                                        <a href="{{url('/homeAdm')}}"  class="btn btn-info">
                                            {{ __('Guardar') }}
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
    <div class="modal fade" id="newre">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Agregar requisitos</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="" class="form-horizontal form-material">
                        {!! csrf_field() !!}
                        <div class="panel-body form-row py-2">
                            {{--<input type="hidden" name="form_id" id="form_id" value="{{$form->id}}">--}}

                            <div class="form-group col-md-12">
                                <label for="name" class="control-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" maxlength="180" value="" required>
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
            $('#newre').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                data: {
                    'name': $('#name').val()
                },
                success: function(data) {
                    $('.errorTitle').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#newre').modal('show');
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