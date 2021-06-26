@extends('layouts.frontend')
@section('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/checkout.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}" />

@endsection

@section('content')
<div class="container wrapper">
    <div class="row cart-body">
        <form class="form-horizontal" method="post" action="{{route('checkout')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                <!--REVIEW ORDER-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Review Order <div class="pull-right"><small><a class="afix-1" href="#">Edit Cart</a></small></div>
                    </div>
                    <div class="panel-body">
                        @foreach ($cart_items as $cart_item )
                            <div class="form-group">
                            <div class="col-sm-3 col-xs-3">
                                <img class="img-responsive" src="{{ get_image($cart_item->options['image'], App\Models\Product::IMAGE_SIZE['small']) }}" />
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="col-xs-12">{{ $cart_item->name }}</div>
                                <div class="col-xs-12"><small>Quantity: <span>{{ $cart_item->qty }}</span></small></div>
                            </div>
                            <div class="col-sm-3 col-xs-3 text-right">
                                <h6><span>$</span>{{ $cart_item->price }}</h6>
                            </div>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <div class="col-xs-12">
                                <strong>Subtotal</strong>
                                <div class="pull-right"><span>$</span><span>0.00</span></div>
                            </div>
                            <div class="col-xs-12">
                                <small>Shipping</small>
                                <div class="pull-right"><span>-</span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <hr />
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <strong>Order Total</strong>
                                <div class="pull-right"><span>$</span><span>{{ Cart::total() }}</span></div>
                            </div>
                        </div>
                        <input name="total" value="{{ Cart::total() }}" type="hidden" />
                    </div>
                </div>
                <!--REVIEW ORDER END-->
            </div>
            <div class="span1"></div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6" >
                <!--SHIPPING METHOD-->
                <div class="panel panel-info">
                    <div class="panel-heading">Address</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h4>Shipping Address</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12">
                                <strong>Your Name:</strong>
                                @if ($errors->first('fullname'))
                                    <p class="text-danger"> {{ $errors->first('fullname') }} </p>
                                @endif
                                <input type="text" name="fullname" class="form-control" value="{{Auth::user()->name}}" placeholder="Enter full name"/>
                            </div>
                            <div class="span1"></div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Address:</strong></div>
                            <div class="col-md-12">
                                @if ($errors->first('address'))
                                    <p class="text-danger"> {{ $errors->first('address') }} </p>
                                @endif
                                <input type="text" class="form-control" id="website" placeholder="address" name="address" value="{{Auth::user()->address}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Email:</strong></div>
                            <div class="col-md-12">
                                @if ($errors->first('email'))
                                    <p class="text-danger"> {{ $errors->first('email') }} </p>
                                @endif
                                <input  type="email" name="email" class="form-control" id="eMail" placeholder="Enter email ID" value="{{Auth::user()->email }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Phone:</strong></div>
                            <div class="col-md-12">
                                @if ($errors->first('phone'))
                                    <p class="text-danger"> {{ $errors->first('phone') }} </p>
                                @endif
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone number" value="{{Auth::user()->phone}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Note:</strong></div>
                            <div class="col-md-12">
                                @if ($errors->first('phone'))
                                    <p class="text-danger"> {{ $errors->first('note') }} </p>
                                @endif
                                <textarea type="text" name="note" id="note" class="form-control" value="" ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!--SHIPPING METHOD END-->
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <!-- End container -->
    @endsection

    @section('scripts')
    <script src="{{ asset ('ckeditor/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#note' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    @endsection
