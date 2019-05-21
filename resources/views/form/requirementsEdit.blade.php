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

    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{ __('Editar Requisito') }}</div>

                        <div class="card-body">
                            <form class="form-horizontal py-4" method="post" action=" ">
                                {{ csrf_field() }}
                                <div class="form-row py-2">
                                    <input type="hidden" name="re_id" id="re_id" value="{{$re->id}}">
                                    <div class="form-group col-md-12">
                                        <label for="name" class="control-label">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name" maxlength="180" value="{{$re->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 py-2">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{url('/home/form/requirements/'.$re->job_id.'')}}" class="btn btn-info">
                                            {{ __('Cancelar') }}
                                        </a>
                                        <button type="submit" class="btn btn-info">
                                            {{ __('Guardar') }}
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
@endsection