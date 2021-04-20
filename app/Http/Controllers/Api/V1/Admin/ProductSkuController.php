<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSku;
use App\Models\SkuValue;
use Illuminate\Http\Request;
use App\Http\Requests\Api\ProductSkuRequest;
use App\Http\Resources\ProductSkuResource;
use Illuminate\Support\Facades\DB;

class ProductSkuController extends Controller
{
    public function show($id)
    {
        return new ProductSkuResource(ProductSku::find($id));
    }

    public function store(ProductSkuRequest $request)
    {
        $product_sku_params = $request->only(['product_id', 'sku', 'price', 'sale_price', 'quantity', 'is_default']);
        if ($request->hasFile('image')) {
            $product_sku_params['image'] = save_image($request->image, $request->product_slug, 'product_sku');
        }

        try {
            DB::beginTransaction();
            $product_sku = ProductSku::create($product_sku_params);
            foreach ($request->product_attributes as $attribute_id => $attribute_value_id) {
                $sku_value = new SkuValue;
                $sku_value->product_sku_id = $product_sku->id;
                $sku_value->attribute_id = $attribute_id;
                $sku_value->attribute_value_id = $attribute_value_id;
                $sku_value->save();
            }

            DB::commit();
            return $product_sku;
        } catch(\Exception $e) {
            DB::rollback();
            return $e;
        }
    }
}
