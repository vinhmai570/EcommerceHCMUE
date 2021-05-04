<header id="header" class="header-v1">
    <div id="topbar">
        <div class="container">
            <div class="topbar-left">
                <a class="refresh" href="#" title="twitter"><i class="zmdi zmdi-refresh-sync"></i></a>
                <a class="favor" href="#" title="sky"><i class="zmdi zmdi-favorite-outline"></i></a>
                <div class="cart dropdown">
                    <a class="icon-cart" href="#" title="Cart">
                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                        <span class="cart-count">4</span>
                    </a>
                    <div class="cart-list dropdown-menu">
                        <ul class="list">
                            <li>
                                <a href="#" title="" class="cart-product-image"><img src="{{asset('frontend/images/products/1.jpg')}}" alt="Product"></a>
                                <div class="text">
                                    <p class="product-name">Duma #2145</p>
                                    <p class="product-price">1 x $69.90</p>
                                </div>
                                <a href="#" class="delete-item">
                                    <i class="zmdi zmdi-close-circle-o"></i>
                                </a>
                            </li>
                        </ul>
                        <p class="total"><span>Total cost</span> $1121.98</p>
                        <a class="checkout" href="#" title="view cart">view cart</a>
                        <a class="checkout bg-black" href="#" title="check out">Check out</a>
                    </div>
                </div>
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

                <!-- <

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="http://localhost/admin/img/avatar3_small.jpg">
						<span class="username username-hide-on-mobile">
						</span>
						<i class="fa fa-angle-down"></i>
						</a>
                </div> -->
                
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
    </div>
    <!-- End Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="inner-container">
                <p class="icon-menu-mobile"><span class="icon-bar"></span></p>
                <div class="logo"><a href="#" title="Dana-Logo"><img src="{{asset('frontend/images/Dana-menu-logo.png')}}" alt="Dana-Logo"></a></div>
                <div class="search">
                    <div class="search-form">
                        <form method="get" action="#">
                            <div class="search-select">
                                <i class="zmdi zmdi-chevron-down"></i>
                                <select class="category-search" name="orderby">
                                    <option value="">Select Category</option>
                                    <option value="Headphone">Headphone</option>
                                    <option value="Smart phone">Smart phone</option>
                                    <option value="game consoles">game consoles</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="televison">televison</option>
                                </select>
                            </div>
                            <!-- End search Select -->
                            <input type="text" name="s" class="ajax_autosuggest_input ac_input" value="" placeholder="search Keywork " autocomplete="off">
                            <button class="icon-search" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="menu-top menu-top-v2">
                    <ul class="nav-top">
                        <li class="level1"><a href="#" title="Hopme">Home</a>
                            <ul class="menu-level-1">
                                <li class="level2"><a href="home_v1.html" title="Home 1" target="_blank">Home</a></li>
                                <li class="level2"><a href="about.html" title="Home 2" target="_blank">About us</a></li>
                                <li class="level2"><a href="contact.html" title="Home 3" target="_blank">Contact us</a></li>
                            </ul>
                        </li>
                        <li class="level1"><a href="#" title="Product">Product</a>
                            <ul class="menu-level-1">
                                <li class="level2"><a href="#" title="New" target="_blank">New</a></li>
                                <li class="level2"><a href="#" title="Featured" target="_blank">Featured</a></li>
                                <li class="level2"><a href="#" title="Sale off" target="_blank">Sale off</a></li>

                            </ul>
                        </li>
                        <li class="level1 active"><a href="#" title="Blog">Blog</a>
                            <ul class="menu-level-1">
                                <li class="level2"><a href="#" title="New Blog" target="_blank">New Blog</a></li>
                                <li class="level2"><a href="#" title="lester" target="_blank">lester</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- End menutop -->
            </div>
            <!-- End inner container -->
            @include('frontend/components/sidebar')
        </div>
        <!-- End container -->
    </div>
    <!-- End header-top -->

</header><!-- /header -->
