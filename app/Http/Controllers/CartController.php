<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $cart_items = Cart::content();
        return view('frontend.carts.index', compact('cart_items'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $product_sku = $product->product_skus->find($request->product_sku_id);
        $cart_item = array(
            'id'      => $product->id,
            'name'    => $product->name,
            'qty'     => $request->quantity,
            'price'   => $product_sku->price,
            'options' => array(
                'product_sku_id' => $product_sku->id,
                'image' => $product_sku->image
            ),
            'tax'     => 0
        );
        return response(Cart::add($cart_item));
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return response(Cart::total());
    }

    public function update(Request $request)
    {
        foreach ($request->cart_items as $item) {
            Cart::update($item['rowId'], $item['quantity']);
        }
        $result = array(
            "cart_items" => Cart::content(),
            "total"      => Cart::total()
        );
        return response($result);
    }
}
