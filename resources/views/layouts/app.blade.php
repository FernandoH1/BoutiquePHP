<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Boutique</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('/img/boutique.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="fondosPantalla" style="background-size:cover" >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background: linear-gradient(60deg, #ffde61, #f7ab9f, #ffde61,#f7ab9f, #ffde61)">
            <div class="container">
            <img src="{{ asset('/img/boutique.png') }}" alt="HSS" height="80px" width="80px">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h2><b>Boutique</b></h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            @if(Auth::user()->role == 'admin')
                            <h5><a class="nav-link" href="{{ route('producto.index')}}">{{__('Producto')}}</a></h5>
                            @else()
                            <h5><a class="nav-link" href="{{ route('producto.catalogo')}}">{{__('Catalogo')}}</a></h5>
                            @endif
                        </li>
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
                        
                        <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                            crossorigin="anonymous">
                        </script>
                        <?php 
                            $id = Auth::user()->id 
                        ?>
                       <script>
                                jQuery(document).ready(function(){
                                    var url1 = "http://localhost/BoutiquePHP/public/count/"
                                    url1+='<?=$id?>'
                                    jQuery.ajax({
                                        url:  url1,
                                        method: 'get',
                                        success: function(result){
                                            document.getElementById('contadorC').innerHTML = result.cantidad;
                                        }});
                                    });
                        </script>
                        <!-- //TODO: IMPLEMENTAR EL CONTEO DE PRODUCTOS CARRITO -->
                        <li class="nav-item" id="carritoCompra">
                             @if(Auth::user()->role == 'admin')
                            <input type="hidden">
                            @else()
                            <button id="btnCarrito" onclick="window.location.href='http://localhost/BoutiquePHP/public/cart'" type="button">
                                <div>
                                    <p id="contadorC">0</p>
                                    <img src="{{ asset('/img/carrito.png') }}" alt="HSS" height="40px" width="40px">
                                </div>
                            </button>
                            @endif
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(Auth::user()->role == 'admin')
                                <img src="{{ asset('/img/faces/Admin.png') }}" alt="HSS" height="45px" width="45px">
                                @else()
                                <img src="{{ asset('/img/faces/user.png') }}" alt="HSS" height="45px" width="45px">
                                @endif
                                <b style="font-size: 18px;">{{ Auth::user()->name }}</b>
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
    </div>
</body>


</html>