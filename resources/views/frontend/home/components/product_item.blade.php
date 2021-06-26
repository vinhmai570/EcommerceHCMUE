<div class="product">
    <div class="wrap-title">
        <p class="product-title">{{ $product->name }}</p>
        <p class="product-price"><span>Price: </span>$ {{ $product->sale_price }}</p>
    </div>
    <!-- End wrap-title -->
    <a class="product-images" href="{{ route('product.details', $product->slug) }}" title="">
        <img class="primary_image" src="{{ get_image($product->image, App\Models\Product::IMAGE_SIZE['featured']) }}" alt="{{ $product->name }}" />
    </a>
    <div class="action">
            <a title="add-to-cart" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
    </div>
</div>
