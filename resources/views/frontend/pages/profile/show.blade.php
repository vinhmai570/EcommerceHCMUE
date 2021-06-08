@extends('layouts.frontend')
@section('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/order_list.css') }}">
@endsection

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
                    <div class="row">
                        <div class="bio-row">
                            <p><span>Your Name </span>: {{Auth::user()->name}} </p>
                        </div>
                        <div class="bio-row">
                            <p><span>Birthday</span>: {{Auth::user()->birthday}} </p>
                        </div>

                        <div class="bio-row">
                            <p><span>Email </span>: {{Auth::user()->email}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Mobile </span>: {{Auth::user()->phone}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Address </span>: {{Auth::user()->address}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($orders as $order)
                <div class="col-md-6">
                    <div class="panel" style = "{{$order->status == 1 ? 'border-color:#77c063; border-width: 2px;' : '' }}" >
                        <div class="panel-body">
                            <div class="bio-chart">
                                <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="edit-profile knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="{{$order->id}}" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8"></div>
                            </div>
                            <div class="bio-desk">
                                <h4 class="red">${{number_format($order->total)}}</h4>
                                <p>Name : {{$order->fullname}}</p>
                                <p>Address : {{$order->address}}</p>
                                <p>Phone : {{$order->phone}}</p>
                                <p>order date : {{$order->created_at}}</p>
                                <p>Status : {{$order->status == 1 ? 'finish' : 'Processing' }}
                                <p style="text-align:right;"><a class="btn btn-primary" href="{{route('profile.order_history',$order->id )}}" role="button"><i class="fa fa-eye"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
 