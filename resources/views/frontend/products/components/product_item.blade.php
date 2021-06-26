<div class="item-inner">
    <div class="product">
        <p class="product-title">{{ $product->name }}</p>
        <p class="product-price"><span>price: </span>$ {{ $product->sale_price }}</p>
        <a class="product-images" href="{{ route('product.details', $product->slug) }}" title="">
            <img class="primary_image" src="{{ get_image($product->image, App\Models\Product::IMAGE_SIZE['list']) }}" alt="{{ $product->name }}"/>
            <img class="secondary_image" src="{{ get_image($product->image, App\Models\Product::IMAGE_SIZE['list']) }}" alt="{{ $product->name }}"/>
        </a>
        <p class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <div class="action">
            <a href="#" title="Like"><i class="zmdi zmdi-favorite-outline"></i></a>
            <a href="#" title="add-to-cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
        </div>
    </div>
</div>
