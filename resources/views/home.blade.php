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
                                <img src="{{Auth::user()->image? Auth::user()->image : url('img/faces/christian.jpg')}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <div class="name">
                                <h3 class="title">
                                    {{ Auth::user()->name }} {{ Auth::user()->apellido_p }} {{ Auth::user()->apellido_m }}
                                    <br>
                                    <a href="{{url('/home/edit/profile/'.Auth::user()->id.'')}}" rel="tooltip" title="Editar" class=" btn btn-primary btn-fab btn-fab-mini btn-round">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <a href=" " class=" btn btn-primary btn-fab btn-fab-mini btn-round">
                                        <i class="material-icons">camera_alt</i>
                                    </a>
                                    <a href="{{url('/home/curriculum')}}"  rel="tooltip" class=" btn btn-primary  btn-round">
                                        <i class="material-icons">add</i> Agregar
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
                                <td style="color: #000000">{{ Auth::user()->civil ? Auth::user()->civil : 'No definido' }}</td>
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
                                <td style="color: #000000">{{ Auth::user()->drivecard ? Auth::user()->drivecard : 'No tiene' }}</td>
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
                        <tbody>
                        @forelse($cv as $cvv)
                        <tr>
                            <td>Titulo</td>
                            <td style="color: #000000">{{ $cvv->general}}</td>


                        </tr>
                        <tr>
                            <td>Descripcion</td>
                            <td style="color: #000000">{{ $cvv->description}}</td>


                        </tr>
                        <tr>
                            <td>Disponibilidad</td>
                            <td style="color: #000000">{{ $cvv->available_job}}</td>


                        </tr>
                        <tr>
                            <td>Viaje</td>
                            <td style="color: #000000">{{ $cvv->travel}}</td>
                        </tr>
                        <tr>
                            <td>Salario</td>
                            <td style="color: #000000">{{$cvv->salary }}</td>
                        </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">No registro datos</div>
                        @endforelse
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
    {{--<script>--}}
        {{--$(document).ready(function() {--}}

            {{--$(document).on('click', "#edit-item", function() {--}}
                {{--$(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.--}}

                {{--var options = {--}}
                    {{--'backdrop': 'static'--}}
                {{--};--}}
                {{--$('#edit-usuario').modal(options)--}}
            {{--})--}}

            {{--// on modal show--}}
            {{--$('#edit-usuario').on('show.bs.modal', function() {--}}
                {{--var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?--}}
                {{--var row = el.closest(".data-row");--}}

                {{--// get the data--}}
                {{--var id = el.data('id');--}}
                {{--var nombre = row.children(".nombre").text();--}}
                {{--var inicio = el.data('inicio');--}}
                {{--var fin = el.data('fin');--}}
                {{--// var inicio = row.children(".inicio").text();--}}
                {{--// var fin = row.children(".fin").text();--}}

                {{--// fill the data in the input fields--}}
                {{--//$("#razon_social").val(id);--}}
                {{--$("#pk-periodo").val(id);--}}
                {{--$("#nombres").val(nombre);--}}
                {{--$("#FechaInicios").val(inicio);--}}
                {{--$("#FechaFins").val(fin);--}}

            {{--})--}}

            {{--// on modal hide--}}
            {{--$('#edit-periodo').on('hide.bs.modal', function() {--}}
                {{--$('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')--}}
                {{--$("#edit-form").trigger("reset");--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
@endsection
