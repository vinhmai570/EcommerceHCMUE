<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SkuValue;

class ProductSkuController extends Controller
{
    public function getVariant(Request $request)
    {
        $sku_values = SkuValue::whereIn('product_sku_id', Product::find($request->product_id)->product_skus()->select('id'))
                                    ->where(function ($query) use($request) {
                                        $query->where('attribute_id', 1)->where('attribute_value_id', $request->attribute_value_id[1]);
                                    })
                                    ->orWhere(function ($query) use($request) {
                                        $query->where('attribute_id', 2)->where('attribute_value_id', $request->attribute_value_id[2]);
                                    })->groupBy('product_sku_id')->havingRaw('count(product_sku_id) > ?', [1])->get();
                                // ->where('attribute_id', 1)->where('attribute_value_id', $request->attribute_value_id[1])
                                // ->orWhere();
        dd($sku_values);
    }
}
