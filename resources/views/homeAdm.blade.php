@extends('layouts.app')
@section('body-class','profile-page')
@section('content')
    <style>
        .btn.btn-info{
            background-color: #166b91;
        }
    </style>

    <div class="page-header header-filter" data-parallax="true" style="background-image: url({{url('img/HP_background.jpg')}});"></div>
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

                                    <a href="{{url('profile')}}" rel="tooltip" title="Agregar Foto" class="btn btn-info btn-fab btn-fab-mini btn-round">
                                        <i class="material-icons">camera_alt</i>
                                    </a>
                                </h3>
                                <h4 class="title"><strong>{{ Auth::user()->permiso ? 'Administrador' : 'Postulante' }}</strong></h4>
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
                                <td>Fecha de Nacimiento</td>
                                <td style="color: #000000">{{ date('d-m-Y', strtotime(Auth::user()->birthday ? Auth::user()->birthday  : 'No definido')) }}</td>
                            </tr>
                            <tr>
                                <td>Nacionalidad</td>
                                <td style="color: #000000">{{ Auth::user()->nacionalidad ? Auth::user()->nacionalidad : 'No definido' }}</td>
                            </tr>
                            <tr>
                                <td>Ciudad de residencia</td>
                                <td style="color: #000000">{{ Auth::user()->residencia ? Auth::user()->residencia : 'No definido' }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-8 text-center">
                        <div class="container">
                            <h3 class="title"><strong>Oferta de trabajos</strong> <a href="{{url('/home/form/listJob')}}" class="btn btn-info btn-fab btn-round">
                                    <i class="material-icons">add_box</i>
                                </a></h3>
                        </div>

                        <div class="container">
                            <br>
                            <h3 class="title"><strong>Mi Curriculum</strong></h3>
                        </div>
                        <br>

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
                            <input type="submit" class="btn btn-info btn-round">
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
