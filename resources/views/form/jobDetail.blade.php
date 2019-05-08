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
        .btn.btn-info{
            background-color: #166b91;
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/home/form/jobDetail/'.$job->id.'') }}">
                                {{ csrf_field() }}
                                <input type="text" name="idjob" id="idjob" value="{{$job->id}}">
                                <input type="text" name="idus" id="idus" value="{{ Auth::user()->id }}">
                                {{--<input type="text" name="idform" id="idform" value="{{$form->id}}">--}}
                            <div class="col-sm-12 text-center">
                                <div class="container ">
                            <table id="tablat" class="table table-responsive ">
                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-left" style="color: #000000; width: 30%;"><h4 class="card-title"> Cargo: {{ $job->occupation }} <br>Ciudad: {{ $job->city }} </h4></td>
                                    <td class="text-left" style="color: #000000;width: 40%;"><h4 class="card-title"> Tipo de contrato: {{ $job->time_job }}<br> Valido hasta: {{date('d-m-Y', strtotime($job->validity))}}</h4></td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="color: #000000; width: 30%;"><h4> Descripción del puesto</h4></td>
                                    <td class="text-left" style="color: #000000;width: 40%;"><h4>{{ $job->description }}</h4></td>
                                </tr>
                                <tr>
                                    <td class="text-left" style="color: #000000; width: 30%;"><h4> Roles</h4></td>
                                    <td class="text-left" style="color: #000000;width: 40%;"><h4>{{ $job->roles }}</h4></td>
                                </tr>
                                </tbody>
                            </table>
                                    <hr>
                                <div class="col-sm-12 text-center">
                                    <h4 class="text-left" style="color: #000000; width: 30%;"> Requisitos</h4>

                                    @foreach($re as $req)
                                        @if($job->id == $req->job_id)
                                            <ul class="text-left" style="color: #000000;width: 80%;">
                                                <h5 style="padding-left: 55%">
                                                    <li> {{ $req->name }}</li>
                                                </h5>
                                            </ul>
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="col-md-12 text-center">
                                        {{--<button type="submit" class="btn btn-info">postularse</button>--}}
                                        <a type="button" class="btn btn-info">
                                            {{ __('Postularse') }}
                                        </a>
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
    {{--<script type="text/javascript">--}}
        {{--$('.modal-footer').on('click', '.add', function() {--}}
            {{--$.ajax({--}}
                {{--type: 'POST',--}}
                {{--data: {--}}
                    {{--'idjob': $('#idjob').val(),--}}
                    {{--'idus': $('#idus').val()--}}
                {{--},--}}
                {{--success: function(data) {--}}
                    {{--$('.errorTitle').addClass('hidden');--}}

                    {{--if ((data.errors)) {--}}
                        {{--setTimeout(function () {--}}
                            {{--$('#newskill').modal('show');--}}
                            {{--toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});--}}
                        {{--}, 500);--}}

                        {{--if (data.errors.name) {--}}
                            {{--$('.errorTitle').removeClass('hidden');--}}
                            {{--$('.errorTitle').text(data.errors.name);--}}

                        {{--}--}}
                    {{--}else {--}}
                        {{--toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});--}}
                        {{--$('#tabla').append("<tr><td>" + data.name + "</td><td>" + data.nivel + "</td></tr>");--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}

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