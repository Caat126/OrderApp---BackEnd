<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- styles --}}
    <style>
        .btn-batman {
        border: none;
        position: relative;
        width: 200px;
        height: 73px;
        padding: 0;
        z-index: 2;
        -webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' height='868' width='2500' viewBox='0 0 726 252.17'%3E%3Cpath d='M483.92 0S481.38 24.71 466 40.11c-11.74 11.74-24.09 12.66-40.26 15.07-9.42 1.41-29.7 3.77-34.81-.79-2.37-2.11-3-21-3.22-27.62-.21-6.92-1.36-16.52-2.82-18-.75 3.06-2.49 11.53-3.09 13.61S378.49 34.3 378 36a85.13 85.13 0 0 0-30.09 0c-.46-1.67-3.17-11.48-3.77-13.56s-2.34-10.55-3.09-13.61c-1.45 1.45-2.61 11.05-2.82 18-.21 6.67-.84 25.51-3.22 27.62-5.11 4.56-25.38 2.2-34.8.79-16.16-2.47-28.51-3.39-40.21-15.13C244.57 24.71 242 0 242 0H0s69.52 22.74 97.52 68.59c16.56 27.11 14.14 58.49 9.92 74.73C170 140 221.46 140 273 158.57c69.23 24.93 83.2 76.19 90 93.6 6.77-17.41 20.75-68.67 90-93.6 51.54-18.56 103-18.59 165.56-15.25-4.21-16.24-6.63-47.62 9.93-74.73C656.43 22.74 726 0 726 0z'/%3E%3C/svg%3E") no-repeat 50% 50%;
        mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' height='868' width='2500' viewBox='0 0 726 252.17'%3E%3Cpath d='M483.92 0S481.38 24.71 466 40.11c-11.74 11.74-24.09 12.66-40.26 15.07-9.42 1.41-29.7 3.77-34.81-.79-2.37-2.11-3-21-3.22-27.62-.21-6.92-1.36-16.52-2.82-18-.75 3.06-2.49 11.53-3.09 13.61S378.49 34.3 378 36a85.13 85.13 0 0 0-30.09 0c-.46-1.67-3.17-11.48-3.77-13.56s-2.34-10.55-3.09-13.61c-1.45 1.45-2.61 11.05-2.82 18-.21 6.67-.84 25.51-3.22 27.62-5.11 4.56-25.38 2.2-34.8.79-16.16-2.47-28.51-3.39-40.21-15.13C244.57 24.71 242 0 242 0H0s69.52 22.74 97.52 68.59c16.56 27.11 14.14 58.49 9.92 74.73C170 140 221.46 140 273 158.57c69.23 24.93 83.2 76.19 90 93.6 6.77-17.41 20.75-68.67 90-93.6 51.54-18.56 103-18.59 165.56-15.25-4.21-16.24-6.63-47.62 9.93-74.73C656.43 22.74 726 0 726 0z'/%3E%3C/svg%3E") no-repeat 50% 50%;
        -webkit-mask-size: 100%;
        cursor: pointer;
        background-color: transparent;
        transform: translateY(8px)
        }

        .btn-batman:after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        box-shadow: 0px 0 0 0 white;
        transition: all 2s ease;
        }

        .btn-batman:hover:after {
        box-shadow: 0px -13px 56px 12px #ffffffa6;
        }

        .btn-batman span {
        position: absolute;
        width: 100%;
        font-size: 15px;
        font-weight: 100;
        left: 50%;
        top: 39%;
        letter-spacing: 3px;
        text-align: center;
        transform: translate(-50%,-50%);
        color: black;
        transition: all 2s ease;
        }

        .btn-batman:hover span {
        color: white;
        }

        .btn-batman:before {
        content: '';
        position: absolute;
        width: 0;
        height: 100%;
        background-color: black;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        transition: all 1s ease;
        }

        .btn-batman:hover:before {
        width: 100%;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @livewireStyles

</head>

<body class="sidebar-mini layout-fixed" style="height: auto;">
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
    {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav me-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
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
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

    <main class="py-4">
        @yield('content')
    </main>
    </div> --}}


    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            @auth
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                </ul>
            @endauth
        </nav>

        @auth
            <aside class="main-sidebar sidebar-dark-primary elevation-4">

                <a href="{{ route('home') }}" class="brand-link">
                    <img src="{{ asset('logo.png') }}" alt="AdminLTE Logo" class="brand-image elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">AdminPedidos</span>
                </a>

                @if (Auth::user()->verificado == true)
                    <div class="sidebar">
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=0D8ABC&color=fff"
                                    class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="input-group" data-widget="sidebar-search">
                                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-sidebar">
                                        <i class="fas fa-search fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="sidebar-search-results">
                                <div class="list-group"><a href="#" class="list-group-item">
                                        <div class="search-title"><strong class="text-light"></strong>N<strong
                                                class="text-light"></strong>o<strong class="text-light"></strong> <strong
                                                class="text-light"></strong>e<strong class="text-light"></strong>l<strong
                                                class="text-light"></strong>e<strong class="text-light"></strong>m<strong
                                                class="text-light"></strong>e<strong class="text-light"></strong>n<strong
                                                class="text-light"></strong>t<strong class="text-light"></strong> <strong
                                                class="text-light"></strong>f<strong class="text-light"></strong>o<strong
                                                class="text-light"></strong>u<strong class="text-light"></strong>n<strong
                                                class="text-light"></strong>d<strong class="text-light"></strong>!<strong
                                                class="text-light"></strong></div>
                                        <div class="search-path"></div>
                                    </a></div>
                            </div>
                        </div>
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">

                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>
                                            Inicio
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/negocios')}}" class="nav-link {{ (request()->is('negocios*')) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-building"></i>
                                        <p>
                                            Negocios
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/productos')}}" class="nav-link {{ (request()->is('productos*')) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-tags"></i>
                                        <p>
                                            Productos
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/pedidos/registrar')}}" class="nav-link {{ (request()->is('pedidos/registrar*')) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-shopping-cart"></i>
                                        <p>
                                            Pedidos
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/pedidos')}}" class="nav-link {{ (request()->is('pedidos*')) ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-list"></i>
                                        <p>
                                            Listar Pedidos
                                        </p>
                                    </a>
                                </li>
                                {{--
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-hashtag"></i>
                                        <p>
                                            Tags
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-list"></i>
                                        <p>
                                            Blogs
                                            <span class="right badge badge-danger">New</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-comments"></i>
                                        <p>
                                            Comentarios
                                        </p>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Usarios
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                @endif
            </aside>
        @endauth


        <div class="content-wrapper" style="min-height: 815px;">
            @if (Auth::user()->verificado == true)
                {{-- si ya esta verificado se muestra el contenido --}}
                @yield('content')
            @else
                {{-- si no esta verificado, entonces le pedimos que lo verifiqueue ingrese el OTP --}}
                <div class="content">
                    <div class="container-fluid">
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">Bienvenido <b>{{ auth()->user()->name }}</b></div>

                                    <div class="card-body">
                                        @include('includes.alertas')
                                        <form action="{{ url('/verificar') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="telefono">Telefono ingresado</label>
                                                <input type="text" name="otp"
                                                    value="{{ auth()->user()->telefono }}" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="otp">Ingresa el codigo OTP que enviamos al teléfono
                                                    ingresado</label>
                                                <input type="text" name="otp" class="form-control">
                                                @error('otp')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                            <a href="{{ url('/reenviar') }}" class="btn btn-link">Reenviar codigo
                                                OTP</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Desarrollado por @Caat126
            </div>

            <strong>Copyright © 2014-2024 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
        <div id="sidebar-overlay"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

    @livewireScripts


</body>

</html>
