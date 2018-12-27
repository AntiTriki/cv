@extends('layouts.app')
@section('body-class','profile-page')
@section('content')
    <div class="page-header header-filter" data-parallax="true" style="background-image: url({{url('img/city-profile.jpg')}});"></div>
    <div class="main main-raised">
        <div class="profile-content">

            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">

                            <div class="avatar">
                                <img src="{{Auth::user()->image? Auth::user()->image : url('img/faces/christian.jpg')}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>

                            <div class="name">
                                <h3 class="title">{{ Auth::user()->name }} {{ Auth::user()->apellido_p }} {{ Auth::user()->apellido_m }}
                                    <a href="edit/profile" class=" btn btn-primary btn-fab btn-fab-mini btn-round">
                                        <i class="material-icons">edit</i>
                                    </a></h3>
                                <h6>{{ Auth::user()->permiso ? 'Administrador' : 'Postulante' }}</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
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
                            <td style="color: #000000">{{ Auth::user()->civil ? Auth::user()->civil : 'No definido' }}</td>
                        </tr>
                        <tr>
                            <td>Tiene Hijos</td>
                            <td style="color: #000000">{{ Auth::user()->children ? Auth::user()->children : 'No tiene' }}</td>
                        </tr>
                        <tr>
                            <td>Licencia de conducir</td>
                            <td style="color: #000000">{{ Auth::user()->drivecard ? 'Hombre' : 'No tiene' }}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <div class="row text-center">
                    <div class="container">
                    <h4>Mis Curriculum</h4>

                    <a href="{{url('/home/curriculum')}}"  rel="tooltip" class=" btn btn-primary  btn-round">
                        <i class="material-icons">add</i> Agregar
                    </a>


                    </div>
                    <table class="table table-sm">
                        <thead>
                        <tr>

                            <th style="width: 20%" >CV</th>

                            <th class="text-right">Última edición</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($forms as $form)
                        <tr>

                            <td  class="contenido">{{$form->description}}}</td>

                            <td class="text-right">21/12/2018</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-info btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">person</i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-success btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-danger btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row text-center">
                    <div class="container">
                    <h4>Mis Postulaciones</h4>

                    <a href=""  rel="tooltip" class=" btn btn-primary  btn-round">
                        <i class="material-icons">add</i> Agregar
                    </a>


                    </div>
                    <table class="table table-sm">
                        <thead>
                        <tr>

                            <th style="width: 20%" >Oferta</th>

                            <th class="text-right">Última edición</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($forms as $form)
                        <tr>

                            <td  class="contenido">weeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee</td>

                            <td class="text-right">21/12/2018</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" class="btn btn-info btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">person</i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-success btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">edit</i>
                                </button>
                                <button type="button" rel="tooltip" class="btn btn-danger btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">close</i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
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
