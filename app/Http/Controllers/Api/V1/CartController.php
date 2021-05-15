<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $product_sku = $product->product_skus->find($request->product_sku_id);
        $cart_item = array(
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product_sku->price,
            'options' => array(
                'product_sku_id' => $product_sku->id
            )
        );
        return response(Cart::add($cart_item));
    }
}
