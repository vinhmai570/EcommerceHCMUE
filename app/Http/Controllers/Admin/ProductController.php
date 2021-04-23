<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
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
    const ITEM_PER_PAGE = 12;

    public function index()
    {
        $products = Product::join('product_skus', 'products.id', '=', 'product_skus.product_id')->where('product_skus.is_default', 1)->paginate(self::ITEM_PER_PAGE);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $attributes = Attribute::all();
        return view('admin.product.create', compact('categories', 'attributes'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $attributes = Attribute::all();
        $product = Product::find($id);
        $product_skus = ProductSku::where('product_id', $product->id)->get();
        return view('admin.product.edit', compact('categories', 'attributes', 'product', 'product_skus'));
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
                $product = Product::find($id);
                $product_sku_ids = $product->product_skus()->pluck('id');
                SkuValue::where('product_sku_id', $product_sku_ids)->delete();
                $product->delete();
            DB::commit();
            return back()->with('message', 'Delete product successful');
        } catch(\Exception $e) {
            DB::rollback();
            return back()->with('alert-type', 'error')->with('message', 'Delete product Failed');
        }
    }

    public function store(CreateProductRequest $request)
    {
        $product_params = $request->only(['name', 'description', 'content', 'category_id', 'variantion_default_id']);
        $product_params['slug'] = Str::slug($request->name);
        $product_params['is_published'] = $request->boolean('is_published');
        $product_params['is_featured'] = $request->boolean('is_featured');

        try {
            DB::beginTransaction();
            $product = Product::create($product_params);
            $product_sku_params = $request->only(['sku', 'price', 'sale_price', 'quantity']);
            $product_sku_params['is_default'] = true;
            $product_sku_params['image'] = save_image($request->image, $product->slug, 'product_sku');
            $product_sku = $product->product_skus()->save(new ProductSku($product_sku_params));
            $product->variantion_default_id = $product_sku->id;
            $product->save();
            foreach ($request->product_attributes as $attribute_id => $attribute_value_id) {
                $sku_value_params = compact('attribute_id', 'attribute_value_id');
                $product_sku->sku_values()->save(new SkuValue($sku_value_params));
            }
            DB::commit();

            return back()->with('message', 'Create product successful');
        } catch(\Exception $e) {
            DB::rollback();
            return back()->with_input()->with('alert-type', 'error')->with('message', 'Create product failed');
        }
    }

    public function update(UpdateProductRequest $request, $id)
    {
      $product = Product::find($id);
      $product_params = $request->product;
      if ($product->variantion_default_id != $product_params['variantion_default_id']) {
          $product->product_skus()->where('is_default', 1)->update(['is_default'=> 0]);
          $product->product_skus()->find($product_params['variantion_default_id'])->update(['is_default'=> 1]);
      }
      $product_params['slug'] = Str::slug($product_params['name']);
      $product_params['is_published'] = isset($product_params['is_published']) ? true : false;
      $product_params['is_featured']  = isset($product_params['is_featured']) ? true : false;
      $product->update($product_params);
      return redirect()->route('admin.products.index')->with('message', 'Update product successful');
    }
}
