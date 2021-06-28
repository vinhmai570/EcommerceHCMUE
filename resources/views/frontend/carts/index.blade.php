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
        <tbody id="cart-items">
            @foreach ($cart_items as $cart_item )
            <tr class="item_cart {{ $cart_item->rowId }}" value="{{ $cart_item->rowId }}">
                <td class="product-photo"><img src="{{ get_image($cart_item->options['image'], App\Models\Product::IMAGE_SIZE['list']) }}" alt="Futurelife" height="100" width="100"></td>
                <td class="produc-name"><a href="#" title="">{{ $cart_item->name }}</a></td>
                <td class="product-price">${{ $cart_item->price }}</td>
                <td class="product-quantity"><input type="number" size="4" class="input-text qty text" title="SL" value="{{ $cart_item->qty }}" min="0" step="1"></td>
                <td class="total-price" class="total-price">${{ $cart_item->subtotal }}</td>
                <td class="product-remove"><a class="remove" title="" value="{{ $cart_item->rowId }}"></a></td>
            </tr>
            @endforeach
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
                <a class="btn link-button link-border-raidus bg-gray" href="{{ route('product.index') }}" title="Continue shopping">Continue shopping</a>
                <a id="update" class="btn link-button link-border-raidus bg-gray" title="Update cart">Update cart</a>
            </div>
            <!-- End col-md-6 -->
            <div class="col-md-6 cart-totals text-price">
                <div class="title-ver2">
                    <h3>Cart totals</h3>
                </div>
                <ul>
                    <li><span class="text">Subtotal</span><span class="number" id="subtotal">$ {{ Cart::total() }}</span></li>
                    <li><span class="text">Shipping</span><span class="number">$ 0.00</span></li>
                    <li><span class="text totals">Totals Cart</span><span class="number totals" id="total">$ {{ Cart::total() }}</span></li>
                </ul>
                <a class="btn link-button link-border-raidus" href="{{route('checkout')}}" title="Proceed to checkout">Proceed to checkout</a>
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
<script>
jQuery(document).ready(function() {

    $(document).on("click", ".remove", function () {
        let rowId = $(this).attr('value')
        let state = confirm("Remove this item?");

        if (state) {
            url = `{{ URL::to('carts/remove') }}/${rowId}`

            fetchAPI('DELETE', url).then(response => {
                if (response.total) {
                    $('#cart-items').find(`.${rowId}`).remove();
                    $("#total").html('$' + response.total);
                    $("#subtotal").html('$' + response.total);
                    toastr.success('Remove item successful!');
                } else {
                    toastr.error('Remove item failed!');
                }
            })
        }
    });

    $(document).on("click", "#update", function () {
        body = {
            cart_items: []
        }
        $('.item_cart').each(function(){
            item = {
                rowId: $(this).attr('value'),
                quantity: $(this).find('.qty').val()
            }
            body.cart_items.push(item);
        })

        url = '{{ route('cart.update') }}'

        fetchAPI('PUT', url, body).then(response => {
            if (response.total) {
                $("#total").html('$' + response.total);
                $("#subtotal").html('$' + response.total);

                Object.keys(response.cart_items).map(function(key) {
                    $('#cart-items').find(`.${key}`).find('.total-price').html(`$ ${response.cart_items[key].subtotal}`);
                });
                toastr.success('Update cart successful!');
            } else {
                toastr.error('Update cart failed!');
            }
        })
    });

    async function fetchAPI(method = 'GET', url = '', data = {}) {
        const response = await fetch(url, {
            method: method,
            headers: {
            'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        return response.json();
    }
})
</script>
@endsection
