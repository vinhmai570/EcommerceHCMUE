<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/owl-slider.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/settings.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/vendor/animate.css')}}" />
    <title>Home Version1</title>
</head>

<body>
    <header id="header" class="header-v1">
        <div id="topbar">
            <div class="container">
                <div class="topbar-left">
                    <a href="#" title="Dana-Logo"><img src="{{asset('frontend/images/Dana-menu-logo.png')}}" alt="Dana-Logo"></a>
                    <div class="cart dropdown">

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
        </div>
    </header><!-- /header -->
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="profile-nav col-md-3">
                <div class="panel">
                    <div class="user-heading round">
                        <a href="#">
                        <!-- ../../../../../storage/app/public/user/2.1620109788.jpg -->
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="">
                        </a>
                        <h1>{{Auth::user()->name}}</h1>
                        <p>{{Auth::user()->email}}</p>
                        @yield('input_avatar')
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li class=""><a href="{{route('profile.show')}}"> <i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="{{route('profile.edit')}}"> <i class="fa fa-edit"></i> Edit profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="profile-info col-md-9">

                <div class="panel">
                    <div class="bio-graph-heading">
                        Aliquam ac magna metus. Nam sed arcu non tellus fringilla fringilla ut vel ispum. Aliquam ac magna metus.
                    </div>
                    @yield('content')
                </div>
                @yield('exten')
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('frontend/js/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/jquery.themepunch.plugins.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/engo-plugins.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/store.js')}}"></script>
</body>

</html>
