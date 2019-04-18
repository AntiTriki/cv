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

    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;">
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header"><h5>{{ __('Edudacion') }}</h5></div>

                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action=" ">
                                @csrf
                                {{ csrf_field() }}
                                <a  class="btn btn-success btn-fab btn-fab-mini btn-round create-modal">
                                    <i class="material-icons">add</i>
                                </a>
                                <div class="form-row py-1">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar" >
                                        <table class="table table-sm" id="tabla">
                                            <thead>
                                            <tr>
                                                <th style="width: 20%">Institucion/Universidad</th>
                                                <th class="text-center">Titulo</th>
                                                <th class="text-right">Año</th>
                                                <th class="text-right">Grado</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{--@forelse ($title as $titles)--}}
                                                {{--<tr>--}}

                                                {{--</tr>--}}
                                            {{--@empty--}}
                                                {{--<div class="alert alert-danger" role="alert">No tiene datos agregados</div>--}}
                                            {{--@endforelse--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 py-4">
                                    <div class="col-md-12 text-center ">
                                        {{--<a href="{{url('/home/form/index/'.$form->id.'')}}"  class="btn btn-primary">--}}
                                            {{--{{ __('Atras') }}--}}
                                        {{--</a>--}}
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Siguiente') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
