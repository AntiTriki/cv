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
    <div class="  header-filter" ></div>
    <div class=" ">
        <div class="profile-content">

            <div class="container-fluid">
                <div class="row content">
                    <div class="col-sm-12">
                        <div class="profile">
                            <br> <br> <br>
                            <div class="col-md-12 text-left ">
                                <a href="{{url('/homeAdm')}}"  class="btn btn-success">
                                    <i class="material-icons">keyboard_backspace</i> Atras
                                </a>
                            </div>
                            <br>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/home/form/postulant/'.$pos->id.'') }}">
                                {{ csrf_field() }}
                                {{--<input type="hidden" name="idjob" id="idjob" value="{{$job->id}}">--}}
                                <div class="col-sm-12 text-center">
                                    <div class="container">
                                        <table id="tablat" class="table table-responsive table-sm">
                                            @foreach($jo as $job)
                                                @if($pos->jobs_id == $job->id)
                                            <thead>
                                            <h4 class="card-title text-center">Postulacion para {{$job->occupation}} </h4>
                                            </thead>
                                                @endif
                                            @endforeach
                                            <tbody>
                                            @foreach($for as $form)
                                                @if($form->id == $pos->form_id)
                                                    @foreach($use as $user)
                                                        @if($form->user_id == $user->id)
                                                    <tr>
                                                        <td class="text-left" style="color: #000000; width: 60%;"><h6> Nombre del postulante: {{$user->name}} {{$user->apellido_p}} {{$user->apellido_m}}<br>Correo Electronico: {{$user->email}}
                                                                <br>Nacionalidad: {{$user->nacionalidad}}<br>Residencia: {{$user->residencia}}<br>Estado civil: {{$user->civil}}</h6></td>
                                                        <td class="text-left" style="color: #000000; width: 60%;"><h6> Carnet de identidad: {{$user->ci}}<br>Fecha de nacimiento: {{$user->birthday}}<br>Celular: {{$user->celular}}
                                                                <br>Telefono: {{$user->telefono}}<br>Hijos: {{$user->children}}<br>Licencia de conducir: {{$user->drivecard ? 'Tiene' : 'No tiene'}}</h6></td>
                                                    </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            @foreach($for as $form)
                                                @if($form->id == $pos->form_id)
                                                    <tr>
                                                        <td class="text-left" style="color: #000000;width: 60%;"><h6> Titulo CV: {{$form->general}}<br>Disponible en: {{$form->available_job}}<br>Pretension salarial: {{$form->salary}}</h6></td>
                                                        <td class="text-left" style="color: #000000; width: 60%;"><h6>Descripcion de CV: {{$form->description}}<br>Disponibilidad de viaje: {{$form->travel ? 'Si' : 'No'}}</h6></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>

                                        <table class="table table-sm w-auto" id="tabla">
                                            <thead>
                                            <tr>
                                                <th style="width: 30%;" class="text-left">Institucion/Universidad</th>
                                                <th style="width: 30%;" class="text-left">Titulo</th>
                                                <th style="width: 30%;" class="text-center">Año de Titulacion</th>
                                                <th  class="text-center">Grado</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($for as $form)
                                                @if($form->id == $pos->form_id)
                                                    @foreach($ti as $titles)
                                                    @if($form->id == $titles->form_id)
                                                <tr>
                                                    <td class="text-left">{{$titles->institucion}}</td>
                                                    <td class="text-left">{{$titles->titulo}}</td>
                                                    <td class="text-center">{{$titles->year}}</td>
                                                    @foreach($gra as $gr)
                                                        @if($titles->grade_id == $gr->id)
                                                            <td class="text-center">{{$gr->grado}}</td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                                @endif
                                                @endforeach
                                            @endif
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <table class="table table-sm w-auto" id="tabla">
                                            <thead>
                                            <tr>
                                                <th class="text-left">Empresa</th>
                                                <th class="text-center">Cargo que desempeñaba</th>
                                                <th class="text-center">Descripcion</th>
                                                <th class="text-center">Fecha de ingreso</th>
                                                <th class="text-center">Fecha de salida</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($for as $form)
                                                @if($form->id == $pos->form_id)
                                                    @foreach($ti as $titles)
                                                        @if($form->id == $titles->form_id)
                                                            <tr>
                                                                <td class="text-left">{{$titles->institucion}}</td>
                                                                <td class="text-left">{{$titles->titulo}}</td>
                                                                <td class="text-center">{{$titles->year}}</td>
                                                                @foreach($gra as $gr)
                                                                    @if($titles->grade_id == $gr->id)
                                                                        <td class="text-center">{{$gr->grado}}</td>
                                                                    @endif
                                                                @endforeach
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
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