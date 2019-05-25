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

    <div class="page-header header-filter" style="background-image: url({{asset('img/city1.jpg')}}); background-size: cover; background-position: top center;"> >
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{ __('Editar Trabajo') }}</div>

                        <div class="card-body">
                            <form class="form-horizontal py-2" method="post" action="{{url('/home/form/jobEdit/'.$job->id.'')}}">
                                {{ csrf_field() }}
                                <div class="form-row py-2">
                                    <input type="hidden" name="idjob" id="idjob" value="{{$job->id}}">
                                    <input type="hidden" name="idinicio" id="idinicio" value="{{$job->published}}">
                                    <input type="hidden" name="idfin" id="idfin" value="{{$job->validity}}">
                                    <div class="form-group col-md-4">
                                        <label for="occupation" class="control-label">Cargo</label>
                                        <input type="text" class="form-control" id="occupation" name="occupation" maxlength="100" value="{{$job->occupation}}" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="category" class="control-label">Categoria</label>
                                        <select name="category_id" class="form-control" id="category_id">
                                            <option value="1">--Seleccione Categoria--</option>
                                            @foreach($cat as $ca)
                                                <option value="{{$ca->id}}" {{$ca->id==$job->category_id ? 'selected':''}}>{{$ca->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="ciudad" class="control-label">Ciudad</label>
                                        <input type="text" class="form-control" id="city" name="city" maxlength="50" value="{{$job->city}}" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="contrato" class="control-label">Tipo de contrato</label>
                                        <input type="text" class="form-control" id="time_job" name="time_job" maxlength="50" value="{{$job->time_job}}" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="published" class="control-label">Publicado desde</label>
                                        <input type="date" class="form-control datetimepicker" id="published" name="published" value="{{$job->published}}" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="valido" class="control-label">Valido hasta</label>
                                        <input type="date" class="form-control datetimepicker" id="validity" name="validity" value="{{$job->validity}}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="roles" class="control-label">Funciones</label>
                                        <textarea type="text" class="form-control" id="roles" name="roles" rows="3" maxlength="190" required>{{$job->roles}}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="descripcion" class="control-label">Descripcion</label>
                                        <textarea type="text" class="form-control" id="descripcion" name="description" rows="3" maxlength="190" value="" required>{{$job->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 py-2">
                                    <div class="col-md-12 text-center ">
                                        <a href="{{url('/homeAdm')}}" class="btn btn-info">
                                            {{ __('Cancelar') }}
                                        </a>
                                        <button type="submit" class="btn btn-info">
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