<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<<<<<<< HEAD
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
=======
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/bitchest_logo.png') }}" alt="">
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
<<<<<<< HEAD
                            <li class="nav-item dropdown">
=======
                            <li class="nav-item">
                            <a class="nav-link" href="/wallets" style="position:relative;color:#FFF;display:flex;align-items:center;margin-right:25px;">
                                <i style="font-size:34px;margin-right:10px;" class="fas fa-wallet"></i>Mes portefeuilles
                                <span style="color:white;background:#00Aff0;width:20px;height:20px;border-radius:50%;position:absolute;bottom:0px;left:0px;font-size:12px;display:flex;justify-content:center;align-items:center;font-weight:bold;"></span>
                            </a>
                            </li>
                            <li class="nav-item dropdown" style="display:flex;align-items:center;">
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
<<<<<<< HEAD
=======
                           
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            
            @role('admin')
                <div style="display:flex;">
                    <ul class="nav flex-column" style="width:250px;position:fixed;height:100%;background:red;">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Roles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="users">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cryptocurrencies">Cryptomonnaies</a>
                        </li>
                    
                    </ul>
                
                </div>

            @else
            @endrole
<<<<<<< HEAD
            <div style="margin-left:250px;">
                @yield('content')
            </div>
        </main>
    </div>

        <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/1c6875637a.js" crossorigin="anonymous"></script>
=======
            @role('admin')
                <div style="margin-left:250px;">
                    @yield('content')
                </div>
            @else
                <div>
                    @yield('content')
                </div>
            @endrole
        </main>
    </div>
  
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
</body>
</html>
