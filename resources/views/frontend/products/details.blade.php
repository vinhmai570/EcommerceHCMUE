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
                <img id="image" src="{{ get_image($product->image, '600x600') }}" alt="Product"/>
                </a>
                <div class="product-thumb">
                    <ul class="thumb-content">
                        @foreach ($product_variants as $variant)
                        <li class="thumb">
                            <a href="{{ get_image($variant->image, '600x600') }}" title="thumb product view1" onclick="swap(this);return false;">
                            <img src="{{ get_image($variant->image, '600x600') }}" alt="thumb product1">
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
                <p class="cat">{{ $product->category->name }}</p>
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
                <p class="price">$299</p>
            </div>
            <!-- End Price -->
            <p class="description">{{ $product->description }}</p>
            <div class="options">
                <p>Size</p>
                <ul class="size">
                    @foreach ($sizes as $size)
                    <li><a href="#" class="@if($size->product_sku_id == $default_variant->id) size-active @endif">{{ $size->attribute_value->value_name }}</a></li>
                    @endforeach
                </ul>
                <p>Color</p>
                <ul class="color">
                    @foreach ($colors as $color)
                    <li><a class="{{ $color->attribute_value->value_name }} @if($color->product_sku_id == $default_variant->id) color-active @endif" href="#" title="xs"></a></li>
                    @endforeach
                </ul>
                <div class="quantity">
                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" max="100" min="1" step="1">
                </div>
                <!-- End quanity -->
                <a title="link" href="#" class="link-v2"><span>Buy now</span><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                <a title="link" href="#" class="link-v2 link-v2-bg"><span>Wishlist</span><i class="zmdi zmdi-favorite-outline"></i></a>
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
        <div class="item-inner">
                <div class="product">
                    <p class="product-title">Apple watch sport green</p>
                    <p class="product-price"><span>price: </span>$ 650.99</p>
                    <a class="product-images" href="#" title="">
                        <img class="primary_image" src="{{ get_image($product->image, '600x600') }}" alt="images"/>
                        <img class="secondary_image" src="{{ get_image($product->image, '600x600') }}" alt="images"/>
                    </a>
                    <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    <div class="action">
                        <a class="refresh" href="#"><i class="zmdi zmdi-refresh-sync"></i></a>
                        <a href="#" title="Like"><i class="zmdi zmdi-favorite-outline"></i></a>
                        <a href="#" title="add-to-cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- End container -->
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('frontend/js/jquery.elevatezoom.js') }}"></script>
@endsection
