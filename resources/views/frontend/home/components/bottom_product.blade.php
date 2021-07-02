<div class="bottom-product-footer space-padding-tb-50">
    <div class="container">
        <div class="col-md-4">
            <div class="title-text size-25">
                <h3><span>F</span>eatured product</h3>
            </div>
            @each('frontend.home.components.bottom_product_item', $bottom_products_featured, 'product')
        </div>
        <!-- End col-md-4 -->
        <div class="col-md-4">
            <div class="title-text size-25">
                <h3><span>B</span>est Seller</h3>
            </div>
            @each('frontend.home.components.bottom_product_item', $bottom_products_best_seller, 'product')
        </div>
        <!-- End col-md-4 -->
        <div class="col-md-4">
            <div class="title-text size-25">
                <h3><span>N</span>ewest Products</h3>
            </div>
            @each('frontend.home.components.bottom_product_item', $bottom_products_newest, 'product')
        </div>
        <!-- End col-md-4 -->
    </div>
    <!-- End conntainer -->
</div>
