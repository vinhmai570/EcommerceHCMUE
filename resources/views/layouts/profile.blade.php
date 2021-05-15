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
    @include('frontend.components.header')

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
                    With detailed information we serve you better
                    </div>

                    @yield('content')

                </div>

                @yield('exten')

            </div>
        </div>
    </div>

    @include('frontend.components.footer')

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
