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
                                <a href="{{url('/homeAdm')}}"  class="btn btn-success">
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
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/home/form/postulant/'.$pos->id.'') }}">
                                {{ csrf_field() }}
                                {{--<input type="hidden" name="idjob" id="idjob" value="{{$job->id}}">--}}
                                <div class="col-sm-12 text-center">
                                    <div class="container">
                                        <table id="tablat" class="table table-responsive">
                                            <thead>
                                            </thead>
                                            <tbody>
                                                @foreach($for as $form)
                                                    @if($form->id == $pos->form_id)
                                                        @foreach($use as $user)
                                                            @if($form->user_id == $user->id)
                                                    <tr>
                                                        <td class="text-left" style="color: #000000; width: 40%;"><h4 class="card-title"> Nombre del postulante: {{$user->name}} {{$user->apellido_p}} {{$user->apellido_m}}<br>Correo Electronico: {{$user->email}}</h4></td>
                                                        <td class="text-left" style="color: #000000;width: 40%;"><h4 class="card-title"> Titulo CV: {{$form->general}}<br>Descripcion de CV: {{$form->description}}</h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left" style="color: #000000; width: 40%;"><h4>Carnet de identidad: {{$user->ci}}</h4></td>
                                                        <td class="text-left" style="color: #000000;width: 40%;"><h4>Disponible en: {{$form->available_job}}</h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left" style="color: #000000; width: 40%;"><h4>Telefono: {{$user->telefono}}</h4></td>
                                                        <td class="text-left" style="color: #000000;width: 40%;"><h4>Disponibilidad de viaje: {{$form->travel ? 'Si' : 'No'}}</h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left" style="color: #000000; width: 40%;"><h4>Celular: {{$user->celular}}</h4></td>
                                                        <td class="text-left" style="color: #000000;width: 40%;"><h4>Pretension salarial: {{$form->salary}}</h4></td>
                                                    </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-info">postularse</button>
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