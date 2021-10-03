<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use App\Traits\SeoTrait;

class CartController extends Controller
{
    use SeoTrait;

    public function index()
    {
        $cart_items = Cart::content();
        $this->setSeoMeta('Dama shop cart');
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
            'price'   => $product_sku->sale_price,
            'options' => array(
                'product_sku_id' => $product_sku->id,
                'image' => $product_sku->image
            ),
            'tax'     => 0
        );
        Cart::add($cart_item);
        $result = array(
            "cart_count" => Cart::count()
        );

        return response($result);
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        $result = array(
            "total" => Cart::total()
        );
        return response($result);
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
