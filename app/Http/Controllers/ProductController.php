<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductSku;
use App\Models\Attribute;
use App\Services\ProductService;

class ProductController extends Controller
{
    private $product_service;
    private $item_per_page = 6;

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }

    public function index(Request $request)
    {
        $products = $this->product_service->search($request, $this->item_per_page);
        $input = request()->input();
        return view('frontend.products.index', compact('products', 'input'));
    }

    public function list(Request $request)
    {
        $order_by = 'created_at';
        if ($request->order) {
            $order_by = $request->order;
        }

        $products = $this->product_service->paginate($this->item_per_page, $order_by);
        return view('frontend.products.list', compact('products'));
    }

    public function show($slug)
    {
        $product = $this->product_service->withVariantionDefault()->firstWhere('slug', $slug);

        $product_variants = ProductSku::where('product_id', $product->product_id)->get();
        $default_variant = $product_variants->Where('is_default', true)->first();
        $related_products = $this->product_service->getRelatedProducts($product);
        $sizes = Attribute::firstWhere('name', 'Size')->sku_values->whereIn('product_sku_id', $product_variants->pluck('id'))->unique('attribute_value_id');
        $colors = Attribute::firstWhere('name', 'Color')->sku_values->whereIn('product_sku_id', $product_variants->pluck('id'))->unique('attribute_value_id');


        return view('frontend.products.details', compact('product', 'product_variants', 'default_variant', 'related_products', 'sizes', 'colors'));
    }
}
