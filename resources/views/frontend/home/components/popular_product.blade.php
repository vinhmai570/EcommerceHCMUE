<div class="slider-product popular-product tabs-right space-padding-tb-50" data-wow-duration="0.5s"
    data-wow-delay="400ms">
    <div class="container">
        <div class="title-text">
            <h3><span>P</span>opular Product</h3>
        </div>
        <ul class="tabs">
            <li class="item" rel="tab_01">Tables</li>
            <li class="item" rel="tab_02">Chairs</li>
            <li class="item" rel="tab_03">Sofas</li>
            <li class="item" rel="tab_04">Sofas</li>
            <li class="item" rel="tab_05">Sofas</li>
            <li class="item" rel="tab_06">Sofas</li>
        </ul>
        <div class="tab-container space-30">
            <div id="tab_01" class="tab-content">
                <div class="products">
                    <div class="product">
                        <div class="wrap-title">
                            <p class="product-title">Mota SmartWatch G2 Pro</p>
                            <p class="product-price"><span>Price: </span>$ 250.00</p>
                            <ul class="description">
                                <li>Windows 10</li>
                                <li>Intel Quad Core Processors</li>
                                <li>NVIDIA GeForce GTX 950M Graphics Card</li>
                            </ul>
                        </div>
                        <!-- End wrap-title -->
                        <div class="product-images">
                            <div class="slide-product-images">
                                <div class="items" data-thumb='<img class="primary_image" src="assets/images/Dana-home1-product1.jpg" alt=""/>'>
                                    <a href="#" title="products">
                                        <img class="primary_image"
                                            src="{{asset('frontend/images/Dana-home1-product1.jpg')}}" alt="" />
                                    </a>
                                </div>
                                <div class="items"
                                    data-thumb='<img class="primary_image" src="assets/images/Dana-home1-product1.jpg" alt=""/>'>
                                    <a href="#" title="products">
                                        <img class="primary_image" src="assets/images/Dana-home1-product1.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="items"
                                    data-thumb='<img class="primary_image" src="assets/images/Dana-home1-product1.jpg" alt=""/>'>
                                    <a href="#" title="products">
                                        <img class="primary_image" src="assets/images/Dana-home1-product1.jpg" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="action">
                            <a href="#" class="refresh"><i class="zmdi zmdi-refresh-sync"></i></a>
                            <a title="Like" href="#"><i class="zmdi zmdi-favorite-outline"></i></a>
                            <a title="add-to-cart" href="#"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                        </div>
                    </div>
                    <!-- End product -->
                    @each('frontend.products.product_item', $popular_products, 'product')
                </div>
                <!-- End product-tab-content products                                     -->
            </div>
            <!-- End Tables -->
            <div id="tab_02" class="tab-content">
            </div>
            <!-- End Chairs -->
            <div id="tab_03" class="tab-content">
            </div>
            <!-- End sofas -->
            <div id="tab_04" class="tab-content">
            </div>
            <!-- End sofas -->
            <div id="tab_05" class="tab-content">
            </div>
            <!-- End sofas -->
            <div id="tab_06" class="tab-content">
            </div>
            <!-- End sofas -->
        </div>
    </div>
    <!-- End container -->
</div>
