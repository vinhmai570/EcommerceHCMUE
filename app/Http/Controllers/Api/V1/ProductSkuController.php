<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\SkuValue;
use App\Models\Attribute;
use App\Http\Resources\ProductSkuResource;

class ProductSkuController extends Controller
{
    public function getVariant(Request $request)
    {
        $sku_values = SkuValue::whereIn('product_sku_id', Product::find($request->product_id)->product_skus()->select('id'))
                                    ->where(function ($query) use($request) {
                                        $query->where('attribute_id', Attribute::FIRST_ATTRIBUTE_ID)->where('attribute_value_id', $request->attribute_value_id[Attribute::FIRST_ATTRIBUTE_ID]);
                                    })->orWhere(function ($query) use($request) {
                                        $query->where('attribute_id', Attribute::SECOND_ATTRIBUTE_ID)->where('attribute_value_id', $request->attribute_value_id[Attribute::SECOND_ATTRIBUTE_ID]);
                                    })->groupBy('product_sku_id')->havingRaw('count(product_sku_id) > ?', [1])->first();

        if ($sku_values == null) {
            return response('Not Found', 404);
        }

        $product_sku = ProductSku::find($sku_values->product_sku_id);

        return new ProductSkuResource($product_sku);
    }
}
