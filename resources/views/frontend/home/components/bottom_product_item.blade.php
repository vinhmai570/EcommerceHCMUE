<div class="product">
    <a class="product-images" href="{{ route('product.details', $product->slug) }}" title="{{ $product->name }}">
        <img class="primary_image" src="{{ get_image($product->image, App\Models\Product::IMAGE_SIZE['featured']) }}" alt="" />
    </a>
    <div class="product-content">
        <a class="category" href="#" title="category">watch</a>
        <a class="product-name" href="{{ route('product.details', $product->slug) }}" title="{{ $product->name }}">{{ $product->name }}</a>
        <p class="product-price"><span>Price: </span>${{ $product->sale_price }}</p>
        <div class="action">
            <a title="add-to-cart" class="add_to_cart" data-id="{{ $product->product_id }}" data-sku_id="{{ $product->id }}"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
        </div>
    </div>
    <!-- End product content -->
</div>
<!-- end produt item -->
