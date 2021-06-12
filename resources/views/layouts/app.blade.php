<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @yield('extra-script')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .bg-cover{
            background-size:cover;
        }
        
    </style>
</head>
<body>
<div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand text-dark" href="{{ url('/') }}">
                      ECOM<span class="text-danger">MERCE</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto mx-5">
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="{{ url('/Produits') }}">Product</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="{{ route('panier.index') }}"><i class="fas fa-shopping-cart"></i>
                            <span class="badge badge-danger fa-x">
                                    {{ Cart::getContent()->count() }}
                            </span></a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="{{ route('order.index') }}">Order</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('product.search') }}" method="GET">    
                                <div class="input-group rounded mt-2">
                                    <input type="search" class="form-control rounded" name="search" id="search" style="height: 28px;" placeholder="Search" aria-label="Search"
                                    aria-describedby="search-addon" />
                                    <button class="input-group-text border-0 ml-1" type="submit" id="search-addon"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    
                        <!-- Authentication Links -->
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
                             @if(Auth::user()->hasRole('admin'))
                           <li class="nav-item">
                                <a class="nav-link" href="{{ url('/Produit') }}">Admin</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                            @if(Auth::user()->avatar)
                            <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" style="border:1px solid #cccccc;border-radius:45px;width:39px;height:auto;float:left;margin-right:7px;">
                             
                             @endif
                               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    {{ Auth::user()->name }}
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

         <main class="">
             <div class="container mt-2">
                @yield('content')
             </div>
        </main>

        <footer class="page-footer font-small pt-4 mt-5" style="position: relative;">
            <div style="position: absolute;right:0;buttom:0;left:0;background-color: #5D5D61;">
                <div class="container">
                    <ul class="list-unstyled list-inline text-center py-2">
                    <li class="list-inline-item">
                        <h5 class="mb-1 text-white">Register for site</h5>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-rounded">Sign up!</a>
                    </li>
                    </ul>
                </div>
                <div class="footer-copyright text-center text-white py-3">© 2020 Copyright:
                    <a href="/Produits">Home.com</a>
                </div>
            </div>
        </footer>
        
    </div>
</div>

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  @yield('extra-js')
</body>
</html>
