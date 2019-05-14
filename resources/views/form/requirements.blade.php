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
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar" >
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
                                                </tr>
                                                <tr>
                                                    <td></td>
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
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                <input type="text" class="form-control" id="name" name="name" maxlength="100" value="" required>
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