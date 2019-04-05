@extends('layouts.app')
@section('body-class','profile-page')
@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url({{url('img/city-profile.jpg')}});"></div>
    <div class="main main-raised">
        <div class="profile-content">

            <div class="container-fluid">
                <div class="row content">
                    <div class="col-sm-4 sidenav">
                        <div class="profile">

                            <div class="avatar">

                                <img src="img/faces/{{Auth::user()->image ? Auth::user()->image : ('/default_user.png')}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h3 class="title">
                                    {{ Auth::user()->name }} {{ Auth::user()->apellido_p }} {{ Auth::user()->apellido_m }}
                                    <br>
                                    <a href="{{url('/home/edit/profile/'.Auth::user()->id.'')}}" rel="tooltip" title="Agregar" class="btn btn-primary  btn-round">
                                        <i class="material-icons">add</i> Agregar
                                    </a>
                                    <a href="{{url('profile')}}" rel="tooltip" title="Agregar" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                        <i class="material-icons">camera_alt</i>
                                    </a>
                                </h3>
                                <h6>{{ Auth::user()->permiso ? 'Administrador' : 'Postulante' }}</h6>
                            </div>

                        </div>
                        <table class="table">
                            <thead>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Carnet de Identidad</td>
                                <td style="color: #000000">{{ Auth::user()->ci }}</td>
                            </tr>
                            <tr>
                                <td>Correo</td>
                                <td style="color: #000000">{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td>Sexo</td>
                                <td style="color: #000000">{{ Auth::user()->sexo ? 'Hombre' : 'Mujer' }}</td>
                            </tr>
                            <tr>
                                <td>Telefono</td>
                                <td style="color: #000000">{{ Auth::user()->telefono ? Auth::user()->telefono : 'No definido' }}</td>
                            </tr>
                            <tr>
                                <td>Celular</td>
                                <td style="color: #000000">{{ Auth::user()->celular ? Auth::user()->celular : 'No definido' }}</td>
                            </tr>
                            <tr>
                                <td>Fecha de Nacimiento</td>
                                <td style="color: #000000">{{ Auth::user()->birthday ? Auth::user()->birthday  : 'No definido' }}</td>
                            </tr>
                            <tr>
                                <td>Estado Civil</td>
                                <td style="color: #000000">{{ Auth::user()->civil }}</td>
                            </tr>
                            <tr>
                                <td>Nacionalidad</td>
                                <td style="color: #000000">{{ Auth::user()->nacionalidad ? Auth::user()->nacionalidad : 'No definido' }}</td>
                            </tr>
                            <tr>
                                <td>Ciudad de residencia</td>
                                <td style="color: #000000">{{ Auth::user()->residencia ? Auth::user()->residencia : 'No definido' }}</td>
                            </tr>
                            <tr>
                                <td>Hijos</td>
                                <td style="color: #000000">{{ Auth::user()->children ? Auth::user()->children : 'No tiene' }}</td>
                            </tr>
                            <tr>
                                <td>Licencia de conducir</td>
                                <td style="color: #000000">{{ Auth::user()->drivecard ? 'Tiene' : 'No Tiene' }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                <div class="col-sm-8 text-center">
                    <div class="container">
                        <br>
                    <h4>Mi Curriculum</h4>
                    </div>
                    <table class="table  table-sm">
                        <tbody style="text-align: left;">
                            @if (isset ($cv))
                        <tr>
                            <td>Titulo</td>
                            <td style="color: #000000">{{ $cv->general }}</td>
                        </tr>
                        <tr>
                            <td>Descripcion</td>
                            <td style="color: #000000">{{ $cv->description }}</td>
                        </tr>
                        <tr>
                            <td>Disponibilidad</td>
                            <td style="color: #000000">{{ $cv->available_job }}</td>
                        </tr>
                        <tr>
                            <td>Viaje</td>
                            <td style="color: #000000">{{ $cv->travel ? 'No dispone' : 'Si dispone'}}</td>
                        </tr>
                        <tr>
                            <td>Salario</td>
                            <td style="color: #000000">{{$cv->salary }}</td>
                        </tr>
                                @else
                                <h4 style="color: red"><i class="fa fa-exclamation-triangle" role="alert"></i>No tiene curriculum creado</h4>

                                @endif

                        </tbody>
                    </table>
                    {{--<table class="table table-sm">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}

                            {{--<th style="width: 20%" >CV</th>--}}

                            {{--<th class="text-right">Última edición</th>--}}
                            {{--<th class="text-right">Acciones</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@foreach ($forms as $form)--}}
                        {{--<tr>--}}

                            {{--<td  class="contenido">{{$form->general}}</td>--}}

                            {{--<td class="text-right">{{$form->updated_at->format('d/m/Y')}}</td>--}}
                            {{--<td class="td-actions text-right">--}}
                                {{--<a href=""  class="btn btn-info btn-fab btn-fab-mini btn-round">--}}
                                    {{--<i class="material-icons">visibility</i>--}}
                                {{--</a>--}}
                                {{--<button type="button" rel="tooltip" class="btn btn-success btn-fab btn-fab-mini btn-round">--}}
                                    {{--<i class="material-icons">edit</i>--}}
                                {{--</button>--}}
                                {{--<button type="button" rel="tooltip" class="btn btn-danger btn-fab btn-fab-mini btn-round">--}}
                                    {{--<i class="material-icons">close</i>--}}
                                {{--</button>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                    <br>
                    <br>
                    <div class="container">
                        <h4>Mis Postulaciones</h4>
                        <a href=""  rel="tooltip" class=" btn btn-primary  btn-round">
                            <i class="material-icons">add</i> Agregar
                        </a>
                    </div>
                    {{--<table class="table table-sm">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}

                            {{--<th style="width: 20%" >Oferta</th>--}}

                            {{--<th class="text-right">Última edición</th>--}}
                            {{--<th class="text-right">Acciones</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@foreach ($forms as $form)--}}
                            {{--<tr>--}}

                                {{--<td  class="contenido"></td>--}}

                                {{--<td class="text-right">21/12/2018</td>--}}
                                {{--<td class="td-actions text-right">--}}
                                    {{--<button type="button" rel="tooltip" class="btn btn-info btn-fab btn-fab-mini btn-round">--}}
                                        {{--<i class="material-icons">person</i>--}}
                                    {{--</button>--}}
                                    {{--<button type="button" rel="tooltip" class="btn btn-success btn-fab btn-fab-mini btn-round">--}}
                                        {{--<i class="material-icons">edit</i>--}}
                                    {{--</button>--}}
                                    {{--<button type="button" rel="tooltip" class="btn btn-danger btn-fab btn-fab-mini btn-round">--}}
                                        {{--<i class="material-icons">close</i>--}}
                                    {{--</button>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}

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


    <div class="modal fade" id="new-image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Agregar foto de perfil</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="/profile" enctype="multipart/form-data" class="form-horizontal form-material">
                        {!! csrf_field() !!}

                        <div class="panel-body">
                            <h3>usuario </h3>
                            <input type="file" name="image">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-primary btn-round">
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-12 text-center ">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

                                {{--<button type="submit" class="btn btn-primary">--}}
                                {{--{{ __('Siguiente') }}--}}
                                {{--Guardar--}}
                                {{--</button>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
