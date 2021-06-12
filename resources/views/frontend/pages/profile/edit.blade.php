@extends('layouts.frontend')
@section('content')
<div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="profile-nav col-md-3">
                <div class="panel">
                    <div class="user-heading round">
                        <a href="#">
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
                    <div class="panel-body bio-graph-info">
                        <h1>Information</h1>
                    </div>
                    <div class="container">
                        <div class="row gutters">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                <div class="card h-100">
                                    <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row gutters">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="fullName">Full Name</label>
                                                        @if ($errors->first('name'))
                                                        <p class="text-danger"> {{ $errors->first('name') }} </p>
                                                        @endif
                                                        <input type="text" name="name" class="form-control-bootstrap" id="fullName" placeholder="Enter full name" value="{{Auth::user()->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="eMail">Email</label>
                                                        @if ($errors->first('email'))
                                                        <p class="text-danger"> {{ $errors->first('email') }} </p>
                                                        @endif
                                                        <input type="email" name="email" class="form-control-bootstrap" id="eMail" placeholder="Enter email ID" value="{{Auth::user()->email }}" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gutters">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        @if ($errors->first('phone'))
                                                        <p class="text-danger"> {{ $errors->first('phone') }} </p>
                                                        @endif
                                                        <input type="text" name="phone" class="form-control-bootstrap" id="phone" placeholder="Enter phone number" value="{{Auth::user()->phone}}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="website">Address</label>
                                                        @if ($errors->first('address'))
                                                        <p class="text-danger"> {{ $errors->first('address') }} </p>
                                                        @endif
                                                        <input type="text" class="form-control-bootstrap" id="website" placeholder="address" name="address" value="{{Auth::user()->address}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gutters">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="website">birthday</label>
                                                        @if ($errors->first('birthday'))
                                                       <p class="text-danger"> {{ $errors->first('birthday') }} </p>
                                                        @endif
                                                        <input type="date" class="form-control-bootstrap" id="birthday" placeholder="birthday" name="birthday" value="{{Auth::user()->birthday}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="website">change avatar</label>
                                                @if ($errors->first('image'))
                                                <p class="text-danger"> {{ $errors->first('image') }} </p>
                                                @endif
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                            </div>

                                            <div class="row gutters">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="text-right">
                                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
