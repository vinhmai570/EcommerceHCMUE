<div id="secondary" class="widget-area col-xs-12 col-md-3">
    <h3 class="title-secondary">Smart Watches</h3>
    <form action="{{ route('product.index') }}" method="GET">
        <aside class="widget widget_subcategory">
            <h4 class="active">Narrow Search Results</h4>
            <div class="mepnu block">
                <input type="checkbox" id="nar1" name="nar" />
                <label for="nar1"><span class="icon"></span>ON SALE<span class="count">112</span></label>
                <input type="checkbox" id="nar2" name="nar" />
                <label for="nar2"><span class="icon"></span>PRESALE<span class="count">130</span></label>
            </div>
        </aside>
        <aside class="widget">
        <h4 class="active">Price Range</h4>
        <div class="layout-slider">
        <span>From <input id="price_from" type="number" name="price_from" value="{{ isset($input['price_from']) ? $input['price_from'] : ''}}" /></span><br><br>
        <span>To &nbsp &nbsp <input id="price_to" type="number" name="price_to" value="{{ isset($input['price_to']) ? $input['price_to'] : ''}}" /></span>
        </div>
        </aside>

        @foreach (Arr::except($input, ['page', 'price_from', 'price_to']) as $input_name => $input_value)
            <input type="hidden" name="{{ $input_name }}" value="{{ $input_value }}">
        @endforeach

        <button class="btn btn-success" type="submit">Filter</button>
    </form>
</div>
<!-- End Secondary -->
