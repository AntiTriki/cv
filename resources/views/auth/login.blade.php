@extends('layouts.app')

@section('body-class','signup-page')
@section('content')
    <style>
        .btn.btn-info{
            background-color: #166b91;
        }
        .card .card-header-info{
            background: linear-gradient(60deg, #166b91, #0097a7);
        }
    </style>
    <div class="page-header header-filter" style="background-image: url({{asset('img/mientra.jpg')}}); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-info text-center">
                            <h4 class="card-title">Acceso</h4>
                        </div>

                        <div class="card-body">
                            <form autocomplete="off" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="material-icons">mail</i>
                                        </span>
                                    </div>


                                    <input id="email" type="email" class=" form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo electronico" name="email"  required >

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong style="font-size: medium;">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                <br>
                                 <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                 </div>





                                <div class="row">
                                    <div class="col-md-12 form-group text-center mb-0">
                                        <button type="submit" class="btn btn-info btn-link btn-wd btn-lg">
                                            {{ 'ENTRAR' }}
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
