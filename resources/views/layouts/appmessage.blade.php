<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.nombre', 'Placerconce') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('general/images/logo.png') }}">
</head>
    <header style="background:#000;padding:10px">
       
        <div style="float:left;">
        <a href="{{ url('/') }}" class="logo logo_image">
                                            <img src="{{ asset('general/images/logo.png') }}" class="img-fluid" alt="" width="100px">
                                        </a>
            </div>
        <div>
         <h2 style="text-align:center;color:#e41779">{{ Auth::user()->nombre }}</h2>
            </div>
          
    </header>
<body >
    <div id="app">
        <v-toolbar fixed color="white">
            <v-toolbar-side-icon></v-toolbar-side-icon>
            <v-toolbar-title> Placerconce Chat</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
                    @guest
                        <v-btn flat href="{{ route('login') }}">Login</v-btn>
                        <v-btn flat href="{{ route('register') }}">Register</v-btn>
                    @else
                        <v-btn flat href="{{route('home')}}"> Group</v-btn>
                        <v-btn flat href="{{route('private')}}"> Private</v-btn>
                        <v-btn flat> {{ Auth::user()->nombre }}</v-btn>
                        <v-btn flat
                        @click=" $refs.logoutForm.submit(); ">
                        Logout</v-btn>
                    @endguest
                    <form ref="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </v-toolbar-items>
        </v-toolbar>

        <main class="mt-5">
            <v-container fluid>
                @yield('content')
            </v-container>
        </main>
    </div>
</body>
</html>
