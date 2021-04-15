<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\SkuValue;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $attributes = Attribute::all();
        return view('admin.product.create', compact('categories', 'attributes'));
    }

    public function store(Request $request)
    {
        $product_params = $request->only(['name', 'description', 'content', 'category_id']);
        $product_params['slug'] = Str::slug($request->name);
        $product_params['is_published'] = $request->boolean('is_published');
        $product_params['is_featured'] = $request->boolean('is_featured');
        $product = Product::create($product_params);
        if ($product) {
            $product_sku_params = $request->only(['sku', 'price', 'sale_price', 'quantity']);
            $product_sku_params['product_id'] = $product->id;
            $product_sku_params['is_default'] = true;
            ProductSku::create($product_sku_params);
            return back();
        }

        return back()->with_input();
    }
}
