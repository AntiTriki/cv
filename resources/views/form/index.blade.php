@extends('layout.app')
@section('css')
    <style>
        .loading {
            background: lightgrey;
            padding: 15px;
            position: fixed;
            border-radius: 4px;
            left: 50%;
            top: 50%;
            text-align: center;
            margin: -40px 0 0 -50px;
            z-index: 2000;
            display: none;
        }

        a, a:hover {
            color: white;
        }

        .form-group.required label:after {
            content: " *";
            color: red;
            font-weight: bold;
        }
        input[id="delete_id"] {
            display: none;
        }
    </style>
@endsection
@section('content')
<div class="container">
    {!!Form::open()!!}
    {!!Form::fieldsetOpen('Registro')!!}
    {!!Form::text('nombre', 'Nombre')->placeholder('Tu nombre')->sm()!!}
    {!!Form::text('apellido_p', 'Apellido Paterno')->placeholder('Tu apellido paterno')->sm()!!}
    {!!Form::text('apellido_m', 'Apellido Materno')->placeholder('Tu apellido materno')->sm()!!}
    {!!Form::text('ci', 'Carnet de Identidad')->placeholder('Tu Carnet')->sm()!!}
    {!!Form::text('mail', 'Correo')->placeholder('Tu Correo')->sm()!!}
    {!!Form::select('sexo', 'Género', [1 => 'Masculino', 0 => 'Femenino'])!!}
    {!!Form::text('drivecard', 'Licencia de Conducir')->placeholder('Tu Nro. de Licencia')->sm()!!}
    {!!Form::text('telefono', 'Teléfono')->type('number')->placeholder('Tu teléfono')->sm()!!}
    {!!Form::text('celular', 'Celular')->type('number')->placeholder('Tu celular')->sm()!!}
    {!!Form::text('children', 'Cantidad de Hijos')->type('number')->placeholder('Ninguno')->sm()!!}
    {!!Form::select('civil', 'Estado Civil', [1 => 'Soltero(a)', 2 => 'Casado(a)', 3 => 'Viudo(a)', 4 => 'Divorciado(a)'])!!}





{!!Form::fieldsetClose()!!}
    {!!Form::close()!!}
</div>
@endsection
@section('js')


@endsection