@extends('layouts.frontend')
@section('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/product_details.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="title-ver2">
        <h3>Shopping Cart</h3>
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
        <tbody>
            <tr class="item_cart">
                <td class="product-photo"><img src="assets/images/products/1.jpg" alt="Futurelife" height="100" width="100"></td>
                <td class="produc-name"><a href="#" title="">Name product 01</a></td>
                <td class="product-price">$69.60</td>
                <td class="product-quantity"><input type="number" size="4" class="input-text qty text" title="SL" value="1" min="0" step="1"></td>
                <td class="total-price">$69.60</td>
                <td class="product-remove"><a class="remove" href="#" title=""></a></td>
            </tr>
        </tbody>
    </table>
    <div class="shipping-total">
        <div class="container">
            <div class="col-md-6 coupon">
                <div class="title-ver2">
                    <h3>Coupon code</h3>
                </div>
                <div class="contact-form">
                    <form class="form-horizontal">
                        <div class="form-group col-md-7">
                            <input type="text" class="form-control" id="inputfname" placeholder="Enter your first name...">
                        </div>
                        <div class="form-group col-md-5">
                            <button value="Submit" class="btn link-button link-border-raidus" type="submit">Appy coupon</button>
                        </div>
                    </form>
                </div>
                <a class="btn link-button link-border-raidus bg-gray" href="#" title="Continue shopping">Continue shopping</a>
                <a class="btn link-button link-border-raidus bg-gray" href="#" title="Update cart">Update cart</a>
            </div>
            <!-- End col-md-6 -->
            <div class="col-md-6 cart-totals text-price">
                <div class="title-ver2">
                    <h3>Cart totals</h3>
                </div>
                <ul>
                    <li><span class="text">Subtotal</span><span class="number">$ 1,990.00</span></li>
                    <li><span class="text">Shipping</span><span class="number">$ 50.00</span></li>
                    <li><span class="text totals">Totals Cart</span><span class="number totals">$ 2,040.00</span></li>
                </ul>
                <a class="btn link-button link-border-raidus" href="#" title="Proceed to checkout">Proceed to checkout</a>
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
