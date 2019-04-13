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


    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
    {{--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>--}}
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}

    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;">
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{ __('Curriculum') }} {{$form->general}}</div>

                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('register_skills') }}">
                                @csrf
                                <a  class="btn btn-success btn-fab btn-fab-mini btn-round" id="new">
                                    <i class="material-icons">add</i>
                                </a>
                                <div class="form-row py-1">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar" >
                                        <table class="table table-sm" id="laravel_crud">
                                            <thead>
                                            <tr>
                                                <th style="width: 20%">Conocimientos y habilidades</th>
                                                <th class="text-center">Nivel</th>
                                            </tr>
                                            </thead>
                                            <tbody id="users-crud">
                                            @forelse ($level as $levels)
                                                <tr>
                                                        <td class="contenido"> {{$levels->skill_id}} </td>

                                                        <td class="text-right"><select name="nivel" class="form-control" id="nivel" >
                                                                <option value=" ">-- Seleccione Nivel --</option>
                                                                @foreach($Nivel as $Nivels)
                                                                    <option value="{{$Nivels->id}}" {{$Nivels->id==$levels->nombre_id ? 'selected':'' }}>{{$Nivels->nombre}}</option>
                                                                @endforeach
                                                            </select></td>

                                                        {{--<td class="td-actions text-right">--}}
                                                        {{--<button type="button" rel="tooltip" class="btn btn-success btn-fab btn-fab-mini btn-round">--}}
                                                        {{--<i class="material-icons">edit</i>--}}
                                                        {{--</button>--}}
                                                        {{--<button type="button" rel="tooltip" class="btn btn-danger btn-fab btn-fab-mini btn-round">--}}
                                                        {{--<i class="material-icons">close</i>--}}
                                                        {{--</button>--}}
                                                        {{--</td>--}}
                                                </tr>
                                                {{--@endforeach--}}
                                                    @empty
                                                        <div class="alert alert-danger" role="alert">No existen Notas</div>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>


                                </div>

                                <div class="form-group row mb-0 py-4">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{url('/home/form/index/'.$form->id.'')}}"  class="btn btn-primary">
                                            {{ __('Atras') }}
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrar') }}
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

    <!-- Skills new -->
    <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Registro de Conocimientos y habilidades</h5>
                </div>
                <div class="modal-body">
                    {{--<form role="form" method="post" action="{{url('skills/guardar')}}" class="form-horizontal form-material">--}}
                        <form id="userForm" name="userForm" class="form-horizontal">
                        {{--{!! csrf_field() !!}--}}
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
                        </form>
                        <div class="modal-footer">
                                <div class="col-md-12 text-center ">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                                    {{--<button type="submit" class="btn btn-primary add">--}}
                                    <button type="button" class="btn btn-primary" id="btn-save" value="create">
                                        {{--{{ __('Siguiente') }}--}}
                                        Guardar
                                    </button>
                                </div>
                        </div>
                    {{--</form>--}}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            /*  When user click add user button */
            $('#new').click(function () {
                $('#btn-save').val("create-user");
                $('#userForm').trigger("reset");
                $('#ajax-crud-modal').modal('show');
            });
        });

        if ($("#userForm").length > 0) {
            $("#userForm").validate({

                submitHandler: function(form) {

                    var actionType = $('#btn-save').val();
                    $('#btn-save').html('Sending..');

                    $.ajax({
                        data: $('#userForm').serialize(),
                        url: 'skills.guardar',
                        type: "POST",
                        dataType: 'json',
                        success: function (data) {
                            var user = '<tr><td>' + data.name + '</td><td>' + data.nivel + '</td></tr>';


                            if (actionType == "create-user") {
                                $('#users-crud').prepend(user);
                            }else {
                                $("#user_id_" + data.id).replaceWith(user);
                            }

                            $('#userForm').trigger("reset");
                            $('#ajax-crud-modal').modal('hide');
                            $('#btn-save').html('Save Changes');

                        },
                        error: function (data) {
                            console.log('Error:', data);
                            $('#btn-save').html('Save Changes');
                        }
                    });
                }
            })
        }
    </script>
@endsection
