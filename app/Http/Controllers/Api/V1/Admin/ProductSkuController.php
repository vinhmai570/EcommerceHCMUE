<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSku;
use Illuminate\Http\Request;
use App\Http\Requests\Api\ProductSkuRequest;
use App\Http\Resources\ProductSkuResource;
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

      return ProductSku::create($product_sku_params);
    }
}
