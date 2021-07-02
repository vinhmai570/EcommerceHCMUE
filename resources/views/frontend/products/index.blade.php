@extends('layouts.frontend')
@section('content')
<div class="listing-ver1">
    <div class="container">
      @include('frontend.products.components.sidebar')
      <div id="primary" class="col-xs-12 col-md-9">
            <!-- End Banner Grid -->
            <div class="ordering">
                <!-- end left -->
                <div class="ordering-right">
                    <span class="list"></span>
                    <span class="col active"></span>
                    <form action="{{ route('product.index') }}" method="GET">
                        Sort By
                        @foreach (Arr::except($input, ['page', 'sort']) as $input_name => $input_value)
                            <input type="hidden" name="{{ $input_name }}" value="{{ $input_value }}">
                        @endforeach
                        <select class="orderby" name="sort" onchange="this.form.submit()">
                            <option value="created_at" {{ isset($input['sort']) && $input['sort'] == 'created_at' ? 'selected' : ''}}>NewestArrivals</option>
                            <option value="sale_price" {{ isset($input['sort']) && $input['sort'] == 'sale_price' ? 'selected' : ''}}>Price low to hight</option>
                            <option value="selled_count" {{ isset($input['sort']) && $input['sort'] == 'selled_count' ? 'selected' : ''}}>Selled count</option>
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
                {{ $products->appends(request()->input())->links() }}
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
