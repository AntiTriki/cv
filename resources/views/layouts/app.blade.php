<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<title>{{ config('app.name', 'HP') }}</title>--}}
    <title>HP Medical</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-kit.min.css?v=2.0.5') }}" rel="stylesheet">
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <style>
        .contenido {
            width:100%;



            display: inline-block;
            overflow:hidden;
            white-space:nowrap;
            text-overflow: ellipsis;
        }
        table{
            table-layout: fixed;
            width: 200px;
        }

        th, td {

            width: 100px;
            word-wrap: break-word;
        }
        .logo-image {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            overflow: hidden;
            margin-top: -6px;
        }
    </style>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">



</head>
<body class="@yield('body-class')">
<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand">

                {{------------------------imagen como logo----------------------}}
                {{--<div class="logo-image">--}}
                    {{--<img src="img/hp_logo.png" class="img-fluid">--}}
                {{--</div>--}}
                {{------------------------imagen como logo----------------------}}

                <i class="material-icons">add_comment</i>
                {{  'HP Medical' }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                    @endif
                </li>
                @else
                    <li class="nav-item">
                        <a id="navba" class="nav-link " href="{{ url('/home') }}" role="button">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">exit_to_app</i> {{ __('SALIR') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>

<main class=" wrapper">
            @yield('content')
        </main>

</body>
        <!-- Scripts -->

        <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>


        <script src="{{ asset('js/plugins/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>

        <script src="{{ asset('js/material-kit.js?v=2.0.5') }}" type="text/javascript"></script>

</html>
