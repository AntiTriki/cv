<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HP') }}</title>


    <link href="{{ asset('css/material-kit.min.css?v=2.0.5') }}" rel="stylesheet">
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Scripts -->

    <script src="{{ asset('js/core/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/core/popper.min.js') }}" ></script>
    <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" ></script>


    <script src="{{ asset('js/plugins/moment.min.js') }}" ></script>
    <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" ></script>
    <script src="{{ asset('js/plugins/nouislider.min.js') }}" ></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="{{ asset('js/material-kit.js?v=2.0.5') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">


</head>
<body class="profile-page sidebar-collapse">

        <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg"  color-on-scroll="100"  id="sectionsNav">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'HP') }}
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
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                        @else
                            <li class="nav-item">
                                <a id="navba" class="nav-link " href="#" role="button"  a >
                                    {{ Auth::user()->name }}
                                </a>


                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="material-icons">cloud_download</i> {{ __('Logout') }}
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
        <main class="py-5">
            @yield('content')
        </main>

</body>
</html>
