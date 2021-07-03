<header id="header" class="header-v3">
    <div id="topbar">
        <div class="container">
            <div class="topbar-left">
                <a class="facebook" href="#" title="facebook"><i class="zmdi zmdi-facebook"></i></a>
                <a class="twitter" href="#" title="twitter"><i class="zmdi zmdi-twitter"></i></a>
                <a class="instagram" href="#" title="instagram"><i class="zmdi zmdi-instagram"></i></a>
                <a class="google" href="#" title="google"><i class="zmdi zmdi-google-glass"></i></a>

                <!-- End cart -->
            </div>
            <!-- End topBar-left -->
            <div class="topbar-right">
                <a href="#" title="Guarantee"><i class="zmdi zmdi-wrench"></i>Guarantee</a>
                <a href="#" title="Adress"><i class="zmdi zmdi-pin"></i>Store location</a>
                <div class="wrap-dollar-box dropdown">
                    <a href="#" title="Dollar"><i class="zmdi zmdi-money-box"></i>Dollar (US)<i class="zmdi zmdi-chevron-down"></i></a>
                    <div class="dollar-list dropdown-menu">
                        <ul>
                            <li><a href="#" title="dollar(us)">Dollar (US)</a></li>
                            <li><a href="#" title="Euro(EUR)">Euro(EUR)</a></li>
                        </ul>
                    </div>
                </div>

                @if (Auth::check())

                <div class="wrap-dollar-box dropdown">
                    <a href="#" title="Account"><i class="zmdi zmdi-account"></i>{{Auth::user()->name}} <i class="zmdi zmdi-chevron-down"></i></a>
                    <div class="dollar-list dropdown-menu">
                        <ul>
                            <li><a href="{{route('profile.show')}}" title="information">Profile</a></li>
                        </ul>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary">Logout</button>
                        </form>
                    </div>
                </div>

                @else
                <a class="sign-in" href="{{route('login')}}" title="user"><i class="zmdi zmdi-account"></i>Sign In</a>
                @endif
            </div>
        </div>
        <!-- End topbar-right -->
    </div>
    <!-- End container -->

    <!-- End Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="inner-container">
                <p class="icon-menu-mobile"><span class="icon-bar"></span></p>
                <div class="logo"><a href="{{ URL::to('') }}" title="Dana-Logo"><img src="{{asset('frontend/images/Dana-menu-logo.png')}}" alt="Dana-Logo"></a></div>
                <div class="search">
                    <div class="search-form">
                        <form action="{{ route('product.index') }}" method="GET">
                            <div class="search-select">
                                <i class="zmdi zmdi-chevron-down"></i>
                                <select name="category_id" class="category-search">
                                    <option value="">Select Category</option>
                                    @foreach ($search_categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- End search Select -->
                            <input type="text" autocomplete="off" placeholder="search Keywork " value="" class="ajax_autosuggest_input ac_input" name="q">
                            <button type="submit" class="icon-search">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <!-- End search -->
            </div>
            <!-- End inner container -->
        </div>
        <!-- End container -->
    </div>
    <!-- End header-top -->
    <nav class="menu-mobile">
        <ul class="nav">
            <li class="level1"><a href="#" title="Headphone">Headphone</a>
                <ul class="menu-level-1">
                    <li class="level2"><a href="#" title="Home 1" target="_blank">Headphone 1</a></li>
                </ul>
            </li>
            <li class="level1">
                <a href="#" title="Smart watch">Smart watch</a>
                <ul class="menu-level-1">
                    <li class="level2">
                        <a href="#">Laptop</a>
                        <ul class="menu-level-2">
                            <li class="level3"><a href="#" title="Apple">Apple</a></li>
                        </ul>
                    </li>
                    <li class="level2">
                        <a href="#">Accessories</a>
                        <ul class="menu-level-2">
                            <li class="level3"><a href="#" title="Submenu1">Submenu1</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="level1"><a href="#" title="Smart phone ">Smart phone </a></li>
            <li class="level1"><a href="#">game consoles</a></li>
            <li class="level1"><a href="#" title="Laptop">Laptop</a></li>
            <li class="level1"><a href="#" title="televison">televison</a></li>
        </ul>
    </nav>
    <!-- End menu  mobile -->
    <nav class="mega-menu">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <ul class="nav navbar-nav" id="navbar">
                <li class="level1 {{ Route::currentRouteNamed(['home', 'root']) ? 'active' : '' }}"><a href="/" title="Home">Home</a></li>
                <li class="level1 {{ Route::currentRouteNamed('product.index') && empty(request()->input()['category_id']) ? 'active' : '' }}"><a href="{{ route('product.index') }}" title="All Products">All Products</a></li>
                @foreach (App\Models\Product::MAIN_CATEGORIES as $id => $name)
                    <li class="level1 {{ isset(request()->input()['category_id']) && request()->input()['category_id'] == $id ? 'active' : '' }}"><a href="{{ route('product.index') }}?category_id={{ $id }}" title="{{ $name }}">{{ $name }}</a></li>
                @endforeach
            </ul>
            <div class="menu-icon-right">
                <a class="refresh" href="#" title="twitter"><i class="zmdi zmdi-refresh-sync"></i></a>
                <a class="favor" href="#" title="sky"><i class="zmdi zmdi-favorite-outline"></i></a>

                <div class="cart dropdown">
                    <a class="icon-cart" href="{{route('cart.index')}}" title="Cart">
                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                        <span id="cart-count" class="cart-count">{{ Cart::count() }}</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- End container -->
    </nav>
    <!-- End mega menu -->
</header><!-- /header -->
