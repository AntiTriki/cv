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
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{ __('Curriculum') }}</div>

                        <div class="card-body">
                            <form class="form-horizontal py-4" method="POST" action="{{ route('register_cv') }}">
                                @csrf


                                <div class="form-row py-4">


                                    <div class="col-md-12">

                                    <textarea class="form-control" placeholder="Descripción de ti" name="description" id="description" rows=2></textarea>
                                    </div>
                                </div>

                                <div class="form-row ">
                                    <div class="col-md-4 ">
                                        <div class="form-check">
                                            <label class="form-check-label">

                                                Disponibilidad inmediata
                                                <input class="form-check-input" type="checkbox" name="available_job" id="available_job" value="">
                                                <span class="form-check-sign">
              <span class="check"></span>
          </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-4 py-4">
                                        <div class="form-check">
                                            <label class="form-check-label">

                                                Disponibilidad de viaje
                                                <input class="form-check-input" type="checkbox" name="travel" id="travel" value="">
                                                <span class="form-check-sign">
              <span class="check"></span>
          </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 py-4">
                                        <input id="salary" type="number" class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}" name="salary" value="{{ old('salary') }}" placeholder="Pretensión Salarial" required autofocus>

                                        @if ($errors->has('salary'))
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('salary') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                </div>


                                




                                <div class="form-row py-4">

                                    <div class="col-md-12">
                                        <table class="table table-bordered" id="dynamic_field">
                                            <tr>
                                                <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                                                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                            </tr>
                                        </table>
                                    </div>


                                </div>



                                <div class="form-group row mb-0 py-4">
                                    <div class="col-md-12 text-center ">
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
