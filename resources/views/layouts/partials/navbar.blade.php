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
