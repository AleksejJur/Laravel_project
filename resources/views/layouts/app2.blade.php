<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Project') }}</title> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>

    <div class="grid">
        <header id="header">
            <div><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></div>

            @guest
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    @else
                        <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        @endguest
        </header>
    </div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>