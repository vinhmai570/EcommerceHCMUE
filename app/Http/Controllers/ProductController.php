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

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }

    public function show($slug)
    {
        $product = $this->product_service->withVariantionDefault()->firstWhere('slug', $slug);
        $product_variants = ProductSku::where('product_id', $product->product_id)->get();
        $default_variant = $product_variants->Where('is_default', 1)->first();
        $sizes = Attribute::firstWhere('name', 'Size')->sku_values->whereIn('product_sku_id', $product_variants->pluck('id'));
        $colors = Attribute::firstWhere('name', 'Color')->sku_values->whereIn('product_sku_id', $product_variants->pluck('id'));
        return view('frontend.products.details', compact('product', 'product_variants', 'default_variant', 'sizes', 'colors'));
    }
}
