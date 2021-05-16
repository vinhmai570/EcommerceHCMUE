@extends('layouts.frontend')
@section('content')
<div class="listing-ver1">
    <div class="container">
      @include('frontend.products.components.sidebar')
      <div id="primary" class="col-xs-12 col-md-9">
            <!-- End Banner Grid -->
            <div class="ordering">
                <div class="ordering-left">
                    <span>Short by:</span>
                    <a href="#" title="NewestArrivals">NewestArrivals</a>
                    <a href="#" title="Price high to low">Price high to low</a>
                </div>
                <!-- end left -->
                <div class="ordering-right">
                    <span class="list"></span>
                    <span class="col active"></span>
                    <form action="{{ route('product.index') }}" method="GET" id="change-limit" class="order-by">
                        <select class="orderby" name="limit" onchange="" id="limit">
                                <option value="12">12 per page</option>
                                <option value="20">20 per page</option>
                        </select>
                    </form>
                </div>
                <!-- End right -->
            </div>
            <!-- End ordering -->
            <div class="products grid_full grid_sidebar" id="products">
                    @include('frontend.products.list')
            </div>
            <!-- End product-content products  -->
            <div class="pagination-container">
                {{ $products->links() }}
            </div>
            <!-- End pagination-container -->
    </div>
    <!-- End Primary -->
    </div>
    <!-- End conainer -->
    </div>
    <!-- End listing-ver1 -->
@endsection

@section('scripts')
<script>
jQuery(document).ready(function() {
    $(document).on("change", "#change-limit", function () {
        limit = $('#limit').val()
        url = `{{ route('product.list') }}?limit=${limit}`

        fetchAPI(url).then(response => {
            $('#products').html(response);
            console.log(response);
        })
    });

    async function fetchAPI(api){
        try {
            let response = await fetch(api);
            return response.text();
        } catch (error) {
            console.error(`error is :${error}`);
        }
    }
})
</script>
<script>
    var trigger = $('.discount_selector');
    var list = $('.discount-list');
    var list_li = $('.discount-list li');
    trigger.click(function() {
        trigger.toggleClass('active');
        list.slideToggle(200);
    });
    // this is optional to close the list while the new page is loading
    list_li.click(function() {
        trigger.click();
        trigger.text($(this).text());
    });
</script>
@endsection
