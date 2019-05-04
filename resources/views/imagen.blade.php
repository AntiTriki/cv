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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{ __('foto de perfil') }} </div>

                        <div class="card-body">

                            <img src="img/faces/{{$user->image ? Auth::user()->image : ('/default_user.png')}}" style="width: 150px; height: 150px;float: left; border-radius: 50%;margin-right: 25px;">
                            <h3>{{$user->name}} </h3>
                            <form class="form-horizontal py-4" method="POST" action="{{URL::to('profile')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row py-4">
                                        {!! csrf_field() !!}
                                        <div class="panel-body">
                                            <span class="btn btn-raised btn-round btn-default btn-file">
                                            <input type="file" name="image">
                                            </span>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" value="Guardar" class="btn btn-info btn-round">
                                        </div>
                                </div>
                                <div class="form-group row mb-0 py-4">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{url('/home')}}"  class="btn btn-info">
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

@endsection
