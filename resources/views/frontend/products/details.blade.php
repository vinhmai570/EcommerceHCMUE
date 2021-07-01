@extends('layouts.frontend')
@section('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/product_details.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="product-details-content">
        <div class="col-md-6 col-sm-6">
            <div class="product-img-box">
                <a id="image-view" title="Product Image">
                <img id="image" src="{{ get_image($product->image, App\Models\Product::IMAGE_SIZE['large']) }}" alt="Product"/>
                </a>
                <div class="product-thumb">
                    <ul class="thumb-content">
                        @foreach ($product_variants as $variant)
                        <li class="thumb">
                            <a href="{{ get_image($variant->image, App\Models\Product::IMAGE_SIZE['large']) }}" title="thumb product view1" onclick="swap(this);return false;">
                            <img src="{{ get_image($variant->image, App\Models\Product::IMAGE_SIZE['large']) }}" alt="thumb product1">
                        </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
              <!-- End product-img-box -->
            <div class="share-tags">
                <div class="share">
                    <span>Share this:</span>
                    <a class="facebook" href="#" title="facebook"><i class="zmdi zmdi-facebook"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
        <div class="product-box-content">
            <div class="product-name">
                <h1>{{ $product->name }}</h1>
                <p class="cat">CATEGORY: {{ $product->category->name }}</p>
                <p class="product-sku">SKU: {{ $default_variant->sku }}</p>
            </div>
            <!-- End product-name -->
            <div class="rating">
                <div class="overflow-h">
                    <div class="icon-rating">
                        <input type="radio" id="star-horizontal-rating-1" name="star-horizontal-rating" checked="">
                        <label for="star-horizontal-rating-1"><i class="fa fa-star"></i></label>
                        <input type="radio" id="star-horizontal-rating-2" name="star-horizontal-rating" checked="">
                        <label for="star-horizontal-rating-2"><i class="fa fa-star"></i></label>
                        <input type="radio" id="star-horizontal-rating-3" name="star-horizontal-rating" checked="">
                        <label for="star-horizontal-rating-3"><i class="fa fa-star"></i></label>
                        <input type="radio" id="star-horizontal-rating-4" name="star-horizontal-rating">
                        <label for="star-horizontal-rating-4"><i class="fa fa-star"></i></label>
                        <input type="radio" id="star-horizontal-rating-5" name="star-horizontal-rating">
                        <label for="star-horizontal-rating-5"><i class="fa fa-star"></i></label>
                    </div>
                </div>
            </div>
            <!-- End Rating -->
            <div class="wrap-price">
                <p class="price" id="price" value="{{ $default_variant->sale_price }}">${{ $default_variant->sale_price }}</p>
            </div>
            <!-- End Price -->
            <p class="description">{!! $product->description !!}</p>
            <input type="hidden" id="product_id" value="{{ $product->product_id }}" >
            <input type="hidden" id="sku_hidden" value="{{ $default_variant->id }}" >
            <div class="options">
                <p>Size</p>
                <ul class="size" id="attribute_size">
                    @foreach ($sizes as $size)
                    <li><a name="attribute_ids[{{ $size->attribute_id }}]" value="{{ $size->attribute_value_id }}" class="size_attr @if($size->product_sku_id == $default_variant->id)size-active @endif">{{ $size->attribute_value->value_name }}</a></li>
                    @endforeach
                </ul>
                <p>Color</p>
                <ul class="color" id="attribute_color">
                    @foreach ($colors as $color)
                    <li><a name="attribute_ids[{{ $color->attribute_id }}]" value="{{ $color->attribute_value_id }}" class="color_attr {{ strtolower($color->attribute_value->value_name) }} @if($color->product_sku_id == $default_variant->id)color-active @endif" title="xs"></a></li>
                    @endforeach
                </ul>
                <div class="quantity">
                    <input type="number" size="4" id="quantity" class="input-text qty text" title="Qty" value="1" name="quantity" max="100" min="1" step="1">
                </div>
                <!-- End quanity -->
                <a title="link" id="add-to-cart" class="link-v2"><span>Buy now</span><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                <a title="link" class="link-v2 link-v2-bg"><span>Wishlist</span><i class="zmdi zmdi-favorite-outline"></i></a>
            </div>
            <!-- End Options -->
            </div>
            <!-- End product box -->
        </div>
        <!-- End col-md-6 -->
    </div>
    <!-- End product-details-content -->
    <div class="hoz-tab-container space-padding-tb-40">
        <ul class="tabs">
            <li class="item" rel="overview">Overview</li>
            <li class="item" rel="specification">Specification</li>
            <li class="item" rel="reviews">Reviews</li>
        </ul>
        <div class="tab-container">
            <div id="overview" class="tab-content">
                <h2>About This Product</h2>
                <div class="panel-body">
                </div>
            </div>
            <div id="specification" class="tab-content">
                <table class="table">
                    <tr>
                        <td>Category</td>
                        <td><b>Gear S2 3G/4G</b></td>
                    </tr>
                </table>
            </div>
            <div id="reviews" class="tab-content">
                <div class="col-md-6">
                    <div class="coment-container">
                    </div>
                    <!-- End comment -->
                </div>
                <div class="col-md-6">
                        <div class="title-ver2">
                            <h3>Add your review</h3>
                        </div>
                        <p class="vote">Vote:</p>
                        <div class="icon-rating">
                            <input type="radio" id="bird-horizontal-rating-1" name="bird-horizontal-rating" checked="">
                            <label for="bird-horizontal-rating-1"><i class="fa fa-star"></i></label>
                            <input type="radio" id="bird-horizontal-rating-2" name="bird-horizontal-rating" checked="">
                            <label for="bird-horizontal-rating-2"><i class="fa fa-star"></i></label>
                            <input type="radio" id="bird-horizontal-rating-3" name="bird-horizontal-rating">
                            <label for="bird-horizontal-rating-3"><i class="fa fa-star"></i></label>
                            <input type="radio" id="bird-horizontal-rating-4" name="bird-horizontal-rating">
                            <label for="bird-horizontal-rating-4"><i class="fa fa-star"></i></label>
                            <input type="radio" id="bird-horizontal-rating-5" name="bird-horizontal-rating">
                            <label for="bird-horizontal-rating-5"><i class="fa fa-star"></i></label>
                        </div>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class=" control-label" for="inputName">Nick Name*</label>
                                <input type="text" class="form-control" id="inputName" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="inputsumary">Summary of Your Review *</label>
                                <input type="text" class="form-control" id="inputsumary" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label class=" control-label" for="inputReview">Review*</label>
                                <input type="text" class="form-control" id="inputReview" placeholder="Review*">
                            </div>
                            <button class="btn link-button link-button-v2" type="submit">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <!-- tab-container -->
    <div class="title-text">
        <h3><span>R</span>elated products</h3>
    </div>
    <!-- End title -->
    <div class="upsell-product products">
        @foreach ($related_products as $product)
        <div class="item-inner">
            <div class="product">
                <p class="product-title">{{ $product->name }}</p>
                <p class="product-price"><span>price: </span>$ {{ $product->sale_price}}</p>
                <a class="product-images" href="{{ route('product.details', $product->slug) }}" title="">
                    <img class="primary_image" src="{{ get_image($product->image, App\Models\Product::IMAGE_SIZE['large']) }}" alt="{{ $product->name }}"/>
                    <img class="secondary_image" src="{{ get_image($product->image, App\Models\Product::IMAGE_SIZE['large']) }}" alt="{{ $product->name }}"/>
                </a>
                <p class="description">{{ $product->short_description }}</p>
                <div class="action">
                    <a title="add-to-cart" class="add_to_cart" data-id="{{ $product->product_id }}" data-sku_id="{{ $product->id }}"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- End container -->
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('frontend/js/jquery.elevatezoom.js') }}"></script>
<script>
jQuery(document).ready(function() {
    $(document).on("click", ".color_attr", function (e) {
        $(".color_attr").removeClass("color-active");
        $(this).addClass("color-active");
        let size = $("#attribute_size").find(".size-active").attr("value");
        let color = $(this).attr("value");
        let product_id = $("#product_id").val();
        url = `{{ URL::to('/api/v1/product-variants') }}/${product_id}?attribute_value_id[1]=${size}&attribute_value_id[2]=${color}`
        fetchAPI(url).then((response) => {
            $("#price").html('$' + response.data.sale_price);
            $(".product-sku").html('SKU: ' + response.data.sku);
            $("#sku_hidden").val(response.data.id);
        })
    });

    $(document).on("click", ".size_attr", function (e) {
        $(".size_attr").removeClass("size-active");
        $(this).addClass("size-active");
        let color = $("#attribute_color").find(".color-active").attr("value");
        let size = $(this).attr("value");
        let product_id = $("#product_id").val();
        url = `{{ URL::to('/api/v1/product-variants') }}/${product_id}?attribute_value_id[1]=${size}&attribute_value_id[2]=${color}`
        fetchAPI(url).then((response) => {
            $("#price").html('$' + response.data.sale_price);
            $(".product-sku").html('SKU: ' + response.data.sku);
            $("#sku_hidden").val(response.data.id);
        })
    });

    $(document).on("click", "#add-to-cart", function () {
        let product_id = $("#product_id").val();
        let product_sku_id = $('#sku_hidden').val();
        let quantity = $('#quantity').val();
        url = '{{ route('cart.add_to_cart') }}'
        body = {
            id: product_id,
            product_sku_id: product_sku_id,
            quantity: quantity
        }

        postData(url, body).then(response => {
            if (response.cart_count) {
                $('#cart-count').html(response.cart_count);
                toastr.success('Add to cart successful!');
            } else {
                toastr.error('Add to cart error!');
            }
        })
    });

    async function fetchAPI(api){
        try {
            let response = await fetch(api);
            let responseJson = await response.json();
            return responseJson;
        } catch (error) {
            console.error(`error is :${error}`);
        }
    }

    async function postData(url = '', data = {}) {
        // Default options are marked with *
        const response = await fetch(url, {
            method: 'POST',
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
