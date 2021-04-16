<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\SkuValue;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $attributes = Attribute::all();
        return view('admin.product.create', compact('categories', 'attributes'));
    }

    public function store(CreateProductRequest $request)
    {
        $product_params = $request->only(['name', 'description', 'content', 'category_id']);
        $product_params['slug'] = Str::slug($request->name);
        $product_params['is_published'] = $request->boolean('is_published');
        $product_params['is_featured'] = $request->boolean('is_featured');

        try {
            DB::beginTransaction();
            $product = Product::create($product_params);
            $product_sku_params = $request->only(['sku', 'price', 'sale_price', 'quantity']);
            $product_sku_params['product_id'] = $product->id;
            $product_sku_params['is_default'] = true;
            $product_sku_params['image'] = save_image($request->image, $product->slug, 'product_sku');
            $product_sku = ProductSku::create($product_sku_params);

            foreach ($request->product_attributes as $attribute_id => $attribute_value_id) {
                $sku_value = new SkuValue;
                $sku_value->product_sku_id = $product_sku->id;
                $sku_value->attribute_id = $attribute_id;
                $sku_value->attribute_value_id = $attribute_value_id;
                $sku_value->save();
            }
            DB::commit();

            return back()->with('message', 'Create product successful');
        } catch(\Exception $e) {
            DB::rollback();
            return back()->with_input()->with('message', 'Create product failed');
        }
    }
}
