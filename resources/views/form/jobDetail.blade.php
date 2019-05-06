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
                                <a href="{{url('/home/form/jobs')}}"  class="btn btn-success">
                                    <i class="material-icons">keyboard_backspace</i> Atras
                                </a>
                            </div>
                            <br>

                            <table class="table table-responsive table-sm">
                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-left" style="color: #000000; width: 30%;">Ciudad: {{ $job->city }} <br> Cargo: {{ $job->occupation }}</td>
                                    {{--<td style="color: #000000; width: 50%;">Cargo: {{ $job->occupation }}</td>--}}
                                    <td style="color: #000000;width: 40%;">Tipo de contrato: {{ $job->time_job }}</td>
                                </tr>
                                <tr>
                                    <td>Descripcion</td>
                                    <td style="color: #000000">{{ $job->description }}</td>
                                </tr>
                                </tbody>
                            </table>
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