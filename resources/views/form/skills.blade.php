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

    {{--prueba--------------------------}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



    <div class="page-header header-filter" style="background-image: url({{asset('img/mientra.jpg')}}); background-size: cover; background-position: top center;">
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header"><h5>{{ __('Curriculum') }} {{$form->general}}</h5></div>

                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ url('/home/skills/'.$form->id.'') }}">
                                @csrf
                                {{ csrf_field() }}
                                <a  class="btn btn-success btn-fab btn-fab-mini btn-round create-modal" style="color: white">
                                    <i class="material-icons">add</i>
                                </a>
                                <div class="form-row">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar" >
                                        <table class="table table-sm" id="tabla">
                                            <thead>
                                            <tr>
                                                <th style="width: 50%;" class="text-left">Conocimientos y habilidades</th>
                                                <th class="text-center">Nivel</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($level as $levels)
                                                <tr>
                                                    @foreach($sk as $sks)
                                                        @if($levels->skill_id == $sks->id)
                                                            <td class="contenido"> {{$sks->name}} </td>
                                                        @endif
                                                    @endforeach

                                                        @foreach($Nivel as $Nivels)
                                                            @if($levels->nombre_id == $Nivels->id)
                                                            <td class="text-center">{{$Nivels->nombre}} </td>
                                                            @endif
                                                        @endforeach

                                                    <td class="td-actions text-right">
                                                        <a href="{{ url('/home/skillsEdit/'.$levels->id.'') }}" class="btn btn-info btn-sm" id="edit-item" rel="tooltip" style="color:rgb(255,255,255)">editar</a>
                                                    </td>
                                    </tr>
                                        @empty
                                            <div class="alert alert-danger" role="alert">No existen Datos</div>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row mb-0 py-1">
                        <div class="col-md-12 text-center ">
                            <a href="{{url('/home/form/index/'.$form->id.'')}}"  class="btn btn-info">
                                {{ __('Atras') }}
                            </a>

                            <a href="{{url('/home/form/title/'.$form->id.'')}}" class="btn btn-info">
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
        <div class="modal fade" id="newskill">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Registro de Conocimientos y habilidades</h5>
                    </div>
                    <div class="modal-body">
                    <form role="form" method="post" action="{{ url('/home/skills/'.$form->id.'') }}" class="form-horizontal form-material">
                        {!! csrf_field() !!}
                        <div class="panel-body">
                            <input type="hidden" name="form_id" id="form_id" value="{{$form->id}}">

                            <div class="form-group col-md-12">
                                <label for="name" class="control-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" maxlength="50" value="" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label">Nivel</label>
                                <select name="nivel" class="form-control" id="nivel">
                                    <option value="1">--Seleccione Nivel--</option>
                                    @foreach($Nivel as $Nivels)
                                        <option value="{{$Nivels->id}}">{{$Nivels->nombre}}</option>
                                    @endforeach
                                </select>
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
            $('#newskill').modal('show');
        });
            $('.modal-footer').on('click', '.add', function() {
                $.ajax({
                    type: 'POST',
                    {{--url: "{{url('/home/skills')}}"+'/'+id,--}}
                    // url: 'skills.guardar',
                    data: {
                        'name': $('#name').val(),
                        'nivel': $('#nivel').val()
                    },
                    success: function(data) {
                        $('.errorTitle').addClass('hidden');

                        if ((data.errors)) {
                            setTimeout(function () {
                                $('#newskill').modal('show');
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
