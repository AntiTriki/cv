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
        .btn.btn-info{
            background-color: #166b91;
        }
        .card .card-header-info{
            background: linear-gradient(60deg, #166b91, #0097a7);
        }
    </style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{ __('Agregar requisitos') }}</div>

                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action=" ">
                                @csrf
                                {{ csrf_field() }}
                                <a  class="btn btn-success btn-fab btn-fab-mini btn-round create-modal" style="color: white">
                                    <i class="material-icons">add</i>
                                </a>
                                {{-----------------------alerta---------------------}}
                                <script>
                                            @if(Session::has('message'))
                                    var type = "{{ Session::get('alert-type', 'info') }}";
                                    switch(type){
                                        case 'info':
                                            toastr.info("{{ Session::get('message') }}");
                                            break;

                                        case 'warning':
                                            toastr.warning("{{ Session::get('message') }}");
                                            break;

                                        case 'success':
                                            toastr.success("{{ Session::get('message') }}");
                                            break;

                                        case 'error':
                                            toastr.error("{{ Session::get('message') }}");
                                            break;
                                    }
                                    @endif
                                </script>
                                <div class="form-row">
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar" >
                                        <table class="table table-sm" id="tabla">
                                            <thead>
                                            <tr>
                                                <th class="text-left">Id</th>
                                                <th class="text-center">Nombre</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($re as $req)
                                                <tr>
                                                    @foreach($job as $jo)
                                                        @if($jo->id == $req->job_id)
                                                            <td class="text-left"> {{$req->id}} </td>
                                                        @endif
                                                    @endforeach

                                                        @foreach($job as $jo)
                                                            @if($req->job_id == $jo->id)
                                                                <td class="text-center"> {{$req->name}} </td>
                                                            @endif
                                                        @endforeach

                                                    {{--<td class="td-actions text-right">--}}
                                                        {{--<a href="{{ url('/home/skillsEdit/'.$levels->id.'') }}" class="btn btn-info btn-sm" id="edit-item" rel="tooltip" style="color:rgb(255,255,255)">editar</a>--}}
                                                    {{--</td>--}}
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger" role="alert">No agrego requisitos</div>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 py-1">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{url('/home/form/listJob')}}"  class="btn btn-info">
                                            {{ __('Atras') }}
                                        </a>

                                        {{--<a href="{{url('/home/form/title/'.$form->id.'')}}" class="btn btn-info">--}}
                                            {{--Siguiente--}}
                                        {{--</a>--}}
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