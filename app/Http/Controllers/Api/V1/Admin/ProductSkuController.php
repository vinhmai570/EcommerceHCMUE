<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\SkuValue;
use Illuminate\Http\Request;
use App\Http\Requests\Api\ProductSkuRequest;
use App\Http\Requests\Api\UpdateProductSkuRequest;
use App\Http\Resources\ProductSkuResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSkuController extends Controller
{
    const NUMBER_CHAR_OF_TOKEN = 8;

    public function show($id)
    {
        return new ProductSkuResource(ProductSku::find($id));
    }

    public function store(ProductSkuRequest $request)
    {
        $product_sku_params = $request->only(['sku', 'price', 'sale_price', 'quantity', 'is_default']);
        try {
            DB::beginTransaction();
            $product = Product::findOrFail($request->product_id);
            if ($request->hasFile('image')) {
                $image_name = $product->slug . '_' . Str::random(self::NUMBER_CHAR_OF_TOKEN);
                $product_sku_params['image'] = save_image($request->image, $image_name, 'product_sku');
            }
            $product_sku = $product->product_skus()->save(new ProductSku($product_sku_params));
            foreach ($request->product_attributes as $attribute_id => $attribute_value_id) {
                $sku_value_params = compact('attribute_id', 'attribute_value_id');
                $product_sku->sku_values()->save(new SkuValue($sku_value_params));
            }

            DB::commit();
            return new ProductSkuResource($product_sku);
        } catch(\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function update(UpdateProductSkuRequest $request, $id)
    {
        $product_sku_params = $request->only(['sku', 'price', 'sale_price', 'quantity', 'is_default']);
        try {
            DB::beginTransaction();
            $product_sku = ProductSku::findOrFail($id);
            if ($request->hasFile('image')) {
                $image_name = $product_sku->product->slug . '_' . Str::random(self::NUMBER_CHAR_OF_TOKEN);
                $product_sku_params['image'] = save_image($request->image, $image_name, 'product_sku');
            }
            $product_sku->update($product_sku_params);
            foreach ($request->product_attributes as $attribute_id => $attribute_value_id) {
                $sku_value_params = compact('attribute_value_id');
                $product_sku->sku_values()->where('attribute_id', $attribute_id)->first()->update($sku_value_params);
            }

            DB::commit();
            return new ProductSkuResource($product_sku);
        } catch(\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    public function destroy($id)
    {
        ProductSku::findOrFail($id)->delete();
        return response()->noContent();
    }
}
