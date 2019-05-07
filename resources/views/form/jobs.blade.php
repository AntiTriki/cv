@extends('layouts.app')
@section('body-class','profile-page')
@section('content')
    <style>
        .btn.btn-success{
            background-color: #3caf78;
        }
        .card .card-header-info{
            background: linear-gradient(60deg, #166b91, #0097a7);
        }
    </style>
    <div class="page-header header-filter" data-parallax="true" style="background-image: url({{url('img/HP_background.jpg')}});"></div>
    <div class="main main-raised">
        <div class="profile-content">

            <div class="container-fluid">
                <div class="row content">
                    <div class="col-sm-12">
                        <div class="profile">
                            <div class="col-md-12 text-left ">
                            <a href="{{route('home')}}"  class="btn btn-success">
                                <i class="material-icons">keyboard_backspace</i> Atras
                            </a>
                            </div>
                            <br>
                            @foreach($job as $jo)
                            <div class="row justify-content-center">
                                <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-header card-header-text card-header-info">
                                                <div class="card-text">
                                                    <h4 class="card-title">{{$jo-> occupation}} - {{$jo-> city}}</h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                {{$jo->description}} <br>
                                                <a href="{{url('/home/form/jobDetail/'.$jo->id.'')}}"  class="btn btn-success"> Detalles</a>
                                            </div>
                                        </div>
                                </div>

                                {{--<div class="col-md-6">--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-header card-header-text card-header-info">--}}
                                            {{--<div class="card-text">--}}
                                                {{--<h4 class="card-title">{{$jo-> occupation}}</h4>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="card-body">--}}
                                            {{--Tecnico superior en mantenimientos de equipo medico--}}
                                            {{--1 año de experiencia cargos similares--}}
                                            {{--<a href=""  class="btn btn-success"> Postularse--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-default">
        <div class="container">
            <nav class="float-left">

            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by HP

            </div>
        </div>
    </footer>
@endsection