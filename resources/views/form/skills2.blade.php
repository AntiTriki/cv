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
    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{ __('Curriculum') }} </div>

                        <div class="card-body">
                            <form class="form-horizontal py-4" method="POST" action="{{ url('/home/skills2/'.$form->id.'') }}">
                                @csrf
                                <div class="form-row py-4">

                                    <div class="table-wrapper-scroll-y my-custom-scrollbar" >
                                        <table class="table table-sm">
                                            <thead>
                                            <button type="button" class="btn btn-success btn-fab btn-fab btn-round" data-toggle="modal" data-target="#new-skill" data-whatever="@mdo">
                                                <i class="material-icons">add</i>
                                            </button>
                                            <tr>
                                                <th style="width: 20%" >Conocimientos y habilidades</th>
                                                <th class="text-right">Nivel</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($skill as $skills)
                                                <tr>
                                                    <td class="contenido">{{$skills->name}}</td>
                                                    <td class="text-right"><select name="nivel" class="form-control" id="nivel">
                                                            <option>--Seleccione Nivel--</option>
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
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                </div>

                                <div class="form-group row mb-0 py-4">
                                    <div class="col-md-12 text-center ">
                                        {{--<a href="{{route('/home/curriculum/'.$id->id.'')}}"  class="btn btn-primary">--}}
                                            {{--{{ __('Atras') }}--}}
                                        {{--</a>--}}
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
    <div class="modal fade" id="new-skill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Registro de Conocimientos y habilidades</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="{{url('/home/skills2')}}" class="form-horizontal form-material">
                        {!! csrf_field() !!}

                        <div class="panel-body">
                            {{--<input type="text" name="form_id" id="form_id" value="{{$form->id}}">--}}
                            <input type="text" name="form_id" id="form_id" value="{{Session('form_ide')}}" >
                            <div class="form-group col-md-12" {{ $errors->has('name') ? ' has-error' : '' }}>
                                <label for="name" class="control-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" maxlength="50" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span id="alerta3" class="help-block">
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
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

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Siguiente') }}

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            var postURL = "<?php echo url('addmore'); ?>";
            var i=1;


            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });


            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#submit').click(function(){
                $.ajax({
                    url:postURL,
                    method:"POST",
                    data:$('#add_name').serialize(),
                    type:'json',
                    success:function(data)
                    {
                        if(data.error){
                            printErrorMsg(data.error);
                        }else{
                            i=1;
                            $('.dynamic-added').remove();
                            $('#add_name')[0].reset();
                            $(".print-success-msg").find("ul").html('');
                            $(".print-success-msg").css('display','block');
                            $(".print-error-msg").css('display','none');
                            $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                        }
                    }
                });
            });


            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $(".print-success-msg").css('display','none');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        });
    </script>
@endsection
