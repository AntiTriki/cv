@extends('layouts.app')

@section('content')
    <style>
        ::-webkit-input-placeholder {
            text-align: center;
        }

        :-moz-placeholder { /* Firefox 18- */
            text-align: center;
        }

        ::-moz-placeholder {  /* Firefox 19+ */
            text-align: center;
        }

        :-ms-input-placeholder {
            text-align: center;
        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{ __('Curriculum') }}</div>

                        <div class="card-body">
                            <h3>prueba enterprise</h3>
                            {{--<form class="form-horizontal py-4" method="POST" action="{{ route('register_skills') }}">--}}
                                {{--@csrf--}}





                                {{--<div class="form-row py-4">--}}

                                    {{--<div class="col-md-12">--}}
                                        {{--<table class="table table-sm">--}}
                                            {{--<thead>--}}
                                            {{--<tr>--}}

                                                {{--<th style="width: 20%" >Empresas de Referencia</th>--}}

                                                {{--<th class="text-right">Nivel</th>--}}
                                                {{--<th class="text-right">Acciones</th>--}}
                                            {{--</tr>--}}
                                            {{--</thead>--}}
                                            {{--<tbody>--}}
                                            {{--@foreach ($form->skills as $skills)--}}
                                                {{--<tr>--}}

                                                    {{--<td  class="contenido">{{$skills->name}}</td>--}}

                                                    {{--<td class="text-right">{{$skills->level}}</td>--}}
                                                    {{--<td class="td-actions text-right">--}}

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
                                    {{--</div>--}}


                                {{--</div>--}}



                                {{--<div class="form-group row mb-0 py-4">--}}
                                    {{--<div class="col-md-12 text-center ">--}}
                                        {{--<button type="submit" class="btn btn-primary">--}}
                                            {{--{{ __('Registrar') }}--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
