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
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <div id="app">
        <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top w-100">
            <div class="container"> 
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/bitchest_logo.png') }}" alt="">
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
                            @role('user')
                            <li class="nav-item">
                                <a class="nav-link" href="/wallets" style="position:relative;color:#FFF;display:flex;align-items:center;margin-right:25px;">
                                    <i style="font-size:34px;margin-right:10px;" class="fas fa-wallet"></i>Mes portefeuilles
                                    <span style="color:white;background:#00Aff0;width:20px;height:20px;border-radius:50%;position:absolute;bottom:0px;left:0px;font-size:12px;display:flex;justify-content:center;align-items:center;font-weight:bold;"></span>
                                </a>
                            </li>
                            @endrole
                            <li class="nav-item dropdown" style="display:flex;align-items:center;">
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
                           
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        </header>

        <main>
            
            @role('admin')
                <nav class="hidden position-fixed d-flex flex-column justify-content-between p-3 " id="sidebar">
                    <div id="toggleNav" class="justify-content-center align-items-center">
                        </i><i class="fas fa-xs fa-angle-double-right"></i>

                    </div>
                    <div id="navTop">
                        <!--
                        <a href="#">
                            <div class="d-flex justify-content-center align-items-center flex-wrap border-bottom pb-5">
                                <i class="fas fa-money-check-alt fa-3x" id="logoIcon"></i>
                                <span class="ml-2" id="logotype">BitChest</span>
                            </div>
                        </a>-->
                        <ul class="my-3 p-0">
                            <a href="#">
                                <li class="sidebar-item d-flex align-items-center mb-2">
                                    <i class="fas fa-lg fa-user-circle"></i>
                                    <span class="text-capitalize ml-2">Roles</span>
                                </li>
                            </a>
                            <a href="users">
                                <li class="sidebar-item d-flex align-items-center mb-2">
                                    <i class="fas fa-lg fa-user-circle"></i>
                                    <span class="text-capitalize ml-2">Utilisateurs</span>
                                </li>
                            </a>
                            <a href="cryptocurrencies">
                                <li class="sidebar-item d-flex align-items-center mb-2">
                                    <i class="fab fa-lg fa-bitcoin"></i>
                                    <span class="text-capitalize ml-2">Les cryptomonnaies</span>
                                </li>
                            </a>
                        </ul>
                    </div>
                    <div id="navBottom" class="d-flex justify-content-between">
                        <div class="sidebar-item align-items-center justify-content-end flex-grow-1" id="closeNav">
                            <i class="fas fa-lg fa-times-circle"></i>
                            <span class="text-capitalize ml-2">Fermer</span>
                        </div>
                    </div>
                </nav>
               <!--
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
                </div>-->

            @else
            @endrole
            @role('admin')
                <div class="margin-content">
                    @yield('content')
                </div>
            @else
                <div style="margin-top:8rem;">
                    @yield('content')
                </div>
            @endrole
        </main>
    </div>
  
     <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js" defer></script>
     <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
