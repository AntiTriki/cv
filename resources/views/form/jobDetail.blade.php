@extends('layouts.app')
@section('body-class','profile-page')
@section('content')
    <script>
        setTimeout(function() {
            $("#alert1").fadeOut();
        },3000);
    </script>

    <style>
        .btn.btn-success{
            background-color: #3caf78;
        }
        .card .card-header-info{
            background: linear-gradient(60deg, #166b91, #0097a7);
        }
        .btn.btn-info{
            background-color: #166b91;
        }
    </style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <div class="page-header header-filter" data-parallax="true" style="background-image: url({{url('img/HP_background.jpg')}});"></div>
    <div class="main main-raised">
        <div class="profile-content">

            <div class="container-fluid">
                <div class="row content">
                    <div class="col-sm-12">
                        <div class="profile">
                            <div class="col-md-12 text-left ">
                                <a href="{{url('/home/form/jobs')}}"  class="btn btn-success">
                                    <i class="material-icons">keyboard_backspace</i> Atras
                                </a>
                            </div>
                            <br>
                            {{-----------------------alerta---------------------}}
                            @if ($message = Session::get('success'))
                                <div id="alert1" class="alert alert-success alert-block" style="margin-right: 20%; margin-left: 20%;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if ($message = Session::get('error'))
                                <div id="alert1" class="alert alert-danger alert-block" style="margin-right: 20%; margin-left: 20%;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            {{-----------------------alerta---------------------}}
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/home/form/jobDetail/'.$job->id.'') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="idjob" id="idjob" value="{{$job->id}}">
                                <input type="hidden" name="idus" id="idus" value="{{ Auth::user()->id }}">
                            <div class="col-sm-12 text-center">
                                <div class="container ">
                                    <h2 class=""> Cargo: {{ $job->occupation }}<br> <h3>Ciudad: {{ $job->city }}
                                        <br>
                                     Tipo de contrato: {{ $job->time_job }}<br> Válido hasta: {{date('d-m-Y', strtotime($job->validity))}}</h3></h2>
                                    <table id="tablat" class="table table-responsive ">

                                            <thead>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="text-left" style="color: #000000; width: 50%;"></td>
                                                <td class="text-left" style="color: #000000;width: 50%;"></td>
                                            </tr>
                                            <tr>
                                                <td class="text-left" style="color: #000000; width: 50%;"><h4> Descripción del puesto</h4></td>
                                                <td class="text-left" style="color: #000000;width: 40%;"><h4>{{ $job->description }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td class="text-left" style="color: #000000; width: 50%;"><h4> Roles</h4></td>
                                                <td class="text-left" style="color: #000000;width: 40%;"><h4>{{ $job->roles }}</h4></td>
                                            </tr><tr>
                                                <td class="text-left" style="color: #000000; width: 50%;"><h4> Requisitos</h4></td>
                                                <td class="text-left" style="color: #000000;width: 40%;"><h4> @foreach($re as $req)
                                                            @if($job->id == $req->job_id)
                                                                <ul class="text-left" style="color: #000000;width: 80%;">
                                                                    <h4 style="padding-left: ">
                                                                        <li> {{ $req->name }}</li>
                                                                    </h4>
                                                                </ul>
                                                            @endif
                                                        @endforeach</h4></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    <hr>
                                {{--<div class="col-sm-12 text-center">--}}
                                    {{--<h4 class="text-left" style="color: #000000; width: 30%;"> Requisitos</h4>--}}

                                   {{----}}
                                    {{--</div>--}}
                                </div>
                                <div class="modal-footer">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-info">postular</button>
                                        {{--<a type="button" class="btn btn-info">--}}
                                            {{--{{ __('Postularse') }}--}}
                                        {{--</a>--}}
                                    </div>
                                </div>
                            </div>
                            </form>
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