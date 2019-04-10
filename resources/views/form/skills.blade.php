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


    <!-- toastr notifications ------------------>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- toastr notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Font Awesome -------------------------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{ __('Curriculum') }} {{$form->general}}</div>

                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('register_skills') }}">
                                @csrf
                                <a  class="create-modal btn btn-success btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">add</i>
                                </a>
                                <div class="form-row py-4">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar" >
                                        <table class="table table-sm" id="tabla">
                                            <thead>

                                                {{--<button type="button" class=" create-modal btn btn-success btn-fab btn-fab btn-round" data-toggle="modal" data-target="#new-skill" data-whatever="@mdo">--}}
                                                {{--<i class="material-icons">add</i>--}}
                                            {{--</button>--}}
                                            <tr>
                                                <th style="width: 20%">Conocimientos y habilidades</th>
                                                <th class="text-center">Nivel</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($level as $levels)
                                                <tr>
                                                    <td class="contenido">{{$levels->id}}</td>
                                                    @foreach ($skill as $skills)
                                                        @if($levels->skill_id == $skills->id)
                                                    <td class="contenido">{{$skills->name}}</td>
                                                        @endif
                                                    @endforeach
                                                    <td class="text-right"><select name="nivel" class="form-control" id="nivel">
                                                            <option>-- Seleccione Nivel --</option>
                                                            @foreach($Nivel as $Nivels)
                                                                <option value="{{$Nivels->id}}">{{$Nivels->nombre}}</option>
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
                                            @endforelse
                                            {{--@foreach ($skill as $skills)--}}
                                                {{--<tr>--}}
                                                    {{--<td class="contenido">{{$skills->name}}</td>--}}
                                                    {{--<td class="text-right"><select name="nivel" class="form-control" id="nivel">--}}
                                                            {{--<option>-- Seleccione Nivel --</option>--}}
                                                            {{--@foreach($Nivel as $Nivels)--}}
                                                                {{--<option value="{{$Nivels->id}}">{{$Nivels->nombre}}</option>--}}
                                                            {{--@endforeach--}}
                                                        {{--</select></td>--}}

                                                    {{--<td class="td-actions text-right">--}}
                                                        {{--<button type="button" rel="tooltip" class="btn btn-success btn-fab btn-fab-mini btn-round">--}}
                                                            {{--<i class="material-icons">edit</i>--}}
                                                        {{--</button>--}}
                                                        {{--<button type="button" rel="tooltip" class="btn btn-danger btn-fab btn-fab-mini btn-round">--}}
                                                            {{--<i class="material-icons">close</i>--}}
                                                        {{--</button>--}}
                                                    {{--</td>--}}
                                                {{--</tr>--}}
                                            {{--@endforeach--}}
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
    <div class="modal fade" id="newskill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Registro de Conocimientos y habilidades</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="{{url('skills/guardar')}}" class="form-horizontal form-material">
                        {{--<form role="form" method="post" class="form-horizontal form-material">--}}
                        {!! csrf_field() !!}

                        <div class="panel-body">
                            <input type="hidden" name="form_id" id="form_id" value="{{$form->id}}">

                            <div class="form-group col-md-12" {{ $errors->has('name') ? ' has-error' : '' }}>
                                <label for="name" class="control-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" maxlength="50" value="{{ old('name') }}">
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                                {{--@if ($errors->has('name'))--}}
                                    {{--<span id="alerta3" class="help-block">--}}
                                        {{--<strong class="text-danger">{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            </div>
                            <div class="form-group col-md-12" {{ $errors->has('name') ? ' has-error' : '' }}>
                                <label for="name" class="control-label">Nivel</label>
                                <select name="nivel" class="form-control" id="nivel">
                                    <option value="1">--Seleccione Nivel--</option>
                                    @foreach($Nivel as $Nivels)
                                        <option value="{{$Nivels->id}}">{{$Nivels->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <div class="col-md-12 text-center ">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                                    <button type="submit" class="btn btn-primary add">
                                    {{--<button type="button" class="btn btn-primary add">--}}
                                        {{--{{ __('Siguiente') }}--}}
                                        Guardar
                                    </button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delay table load until everything else is loaded -->
    <script>
        $(window).load(function(){
            $('#tabla').removeAttr('style');
        })
    </script>

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        // add a new post
        $(document).on('click', '.create-modal', function() {
            $('#newskill').modal('show');
        });

        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'skills.guardar',
                {{--url: "{{ route('skills.guardar') }}",--}}
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
                    } else {
                        toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                        $('#tabla').append("<tr><td>" + data.name + "</td><td>" + data.nivel + "</td></tr>");
                    }
                },
            });
        });
    </script>

@endsection
