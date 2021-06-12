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
                    @each('frontend.home.components.product_item', $popular_products['Headphone'], 'product')
                </div>
                <!-- End product-tab-content products                                     -->
            </div>
            <!-- End Tables -->
            <div id="tab_02" class="tab-content">
                <div class="products">
                    @isset($popular_products['Watch'])
                        @each('frontend.home.components.product_item', $popular_products['Watch'], 'product')
                    @endisset
                </div>
            </div>
            <!-- End Chairs -->
            <div id="tab_03" class="tab-content">
                <div class="products">
                    @isset($popular_products['Phone'])
                        @each('frontend.home.components.product_item', $popular_products['Phone'], 'product')
                    @endisset
                </div>
            </div>
            <!-- End sofas -->
            <div id="tab_04" class="tab-content">
                <div class="products">
                    @isset($popular_products['Game'])
                        @each('frontend.home.components.product_item', $popular_products['Game'], 'product')
                    @endisset
                </div>
            </div>
            <div id="tab_05" class="tab-content">
                <div class="products">
                    @isset($popular_products['Laptop'])
                        @each('frontend.home.components.product_item', $popular_products['Laptop'], 'product')
                    @endisset
                </div>
            </div>
            <div id="tab_06" class="tab-content">
                <div class="products">
                    @isset($popular_products['Televison'])
                        @each('frontend.home.components.product_item', $popular_products['Televison'], 'product')
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <!-- End container -->
</div>
