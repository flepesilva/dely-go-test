<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DelyGo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/delygo.png" width="100" height="50">
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

                        <li class="nav-link">
                            
                            <product-counter-component :count="{{$productsCount}}"></product-counter-component>
                        </li>


                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #33E3FF; border-radius: 40px 10px; padding: 10px 10px;">

                <button class="navbar-toggler" data-target="#menu" data-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="menu">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <h4><a class="nav-link" href="{{ route('productos.index')}}">Productos</a></h4>
                    </li>
                    <li class="nav-item active">
                        <h4><a class="nav-link" href="#">¿Como pagar?</a></h4>
                    </li>
                    <li class="nav-item">
                        <h4><a class="nav-link" href="#">¿Quienes somos?</a></h4>
                    </li>
                    <li class="nav-item">
                        <h4><a class="nav-link" href="#">Contacto</a></h4>
                    </li>

                  </ul>
                </div>

              </nav>
        </div>


        <main class="py-4">
            @yield('content')
        </main>

    </div>

    <div style="background: #343a40">
        <div class="container text-white">
            <!-- Footer -->
            <footer class="page-footer font-small teal pt-4">

                <!-- Footer Text -->
                <div class="container-fluid text-center text-md-left">
                    
                    <!-- Grid row -->
                    <div class="row">

                        <!-- Grid column -->
                        <div class="col">
  
                            <!-- Content -->
                            <h5 class="text-uppercase font-weight-bold">Acerca de DelyGo</h5>

                            <p>Nuestra misión es ayudar a los consumidores con sus compras de verduras.</p>
  
                        </div>
                        <!-- Grid column -->
  
                        <hr class="clearfix w-100 d-md-none pb-3">
  
                        <!-- Grid column -->
                        <div class="col">
  
                            <!-- Content -->
                            <h5 class="text-uppercase font-weight-bold">Contacto</h5>
                            <p>Delygo es hermoso</p>
  
                        </div>

                        <div class="col">
  
                            <!-- Content -->
                            <h5 class="text-uppercase font-weight-bold">Contacto</h5>
                            <p>Delygo es hermoso</p>
  
                        </div>

                        

                        
                    <!-- Grid column -->
  
                    </div>
                <!-- Grid row -->
  
                </div>
                <!-- Footer Text -->
  
                <!-- Copyright -->
                <div class="footer-copyright text-center py-3">© 2020 Copyright:
                    <a href="https://www.delygo.cl/"> DelyGo.cl</a>
                </div>
                <!-- Copyright -->
  
            </footer>
        <!-- Footer -->
  <!-- Footer --> 
        <!-- Footer -->
        </div>
    </div>

    
</body>

</html>
