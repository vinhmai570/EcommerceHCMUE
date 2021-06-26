@extends('layouts.frontend')
@section('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/product_details.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="title-ver2">
        <h3>Order Item/ Id order: {{$id}}</h3>
    </div>
    <!-- End title product -->
    <table class="table space-80">
        <thead>
            <tr>
                <th class="product-photo">Product</th>
                <th class="produc-name">Name</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="total-price">Total</th>
                <th class="product-remove"></th>
            </tr>
        </thead>
        <tbody id="cart-items">
            @foreach ($orderItems as $orderItem )
            <tr class="item_cart {{ $orderItem->product_id }}" value="{{ $orderItem->product_id }}">
                <td class="product-photo"><img src="{{ get_image($orderItem->image, App\Models\Product::IMAGE_SIZE['list']) }}" alt="Futurelife" height="100" width="100"></td>
                <td class="produc-name"><a href="#" title="">{{ $orderItem->name }}</a></td>
                <td class="product-price">${{ number_format($orderItem->price) }}</td>
                <td class="product-quantity">{{ $orderItem->quantity }}</td>
                <td class="total-price" class="total-price">${{ number_format($orderItem->price * $orderItem->quantity) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="shipping-total">
        <div class="container">
            <div class="col-md-6 coupon">
            </div>
            <!-- End col-md-6 -->
            <div class="col-md-6 cart-totals text-price">
                <div class="title-ver2">
                    <h3>totals</h3>
                </div>
                <ul>
                    <li><span class="text">Subtotal</span><span class="number" id="subtotal">$ {{ $orderItem-> subtotal}}</span></li>
                    <li><span class="text">Shipping</span><span class="number">$ 0.00</span></li>
                    <li><span class="text totals">Totals Cart</span><span class="number totals" id="total">$ {{ $total }}</span></li>
                </ul>
            </div>
            <!-- End col-md-6 -->
        </div>
        <!-- End shipping-total -->
        </div>
        <!-- End conainer -->
      </div>
      <!-- End MainContent -->
</div>
<!-- End container -->
@endsection

@section('scripts')
@endsection
