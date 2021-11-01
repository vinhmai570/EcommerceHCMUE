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
                    @each('frontend.home.components.product_item', $popular_products['headphone'], 'product')
                </div>
                <!-- End product-tab-content products                                     -->
            </div>
            <!-- End Tables -->
            <div id="tab_02" class="tab-content">
                <div class="products">
                    @isset($popular_products['watch'])
                        @each('frontend.home.components.product_item', $popular_products['watch'], 'product')
                    @endisset
                </div>
            </div>
            <!-- End Chairs -->
            <div id="tab_03" class="tab-content">
                <div class="products">
                    @isset($popular_products['phone'])
                        @each('frontend.home.components.product_item', $popular_products['phone'], 'product')
                    @endisset
                </div>
            </div>
            <!-- End sofas -->
            <div id="tab_04" class="tab-content">
                <div class="products">
                    @isset($popular_products['game'])
                        @each('frontend.home.components.product_item', $popular_products['game'], 'product')
                    @endisset
                </div>
            </div>
            <div id="tab_05" class="tab-content">
                <div class="products">
                    @isset($popular_products['laptop'])
                        @each('frontend.home.components.product_item', $popular_products['laptop'], 'product')
                    @endisset
                </div>
            </div>
            <div id="tab_06" class="tab-content">
                <div class="products">
                    @isset($popular_products['televison'])
                        @each('frontend.home.components.product_item', $popular_products['televison'], 'product')
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <!-- End container -->
</div>
