<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use App\Models\OrderItem;
use App\Models\Order;
use Auth;
use Cart;

class OrderController extends Controller
{
    const DEFAULT_STATUS = 0;

    public function index(){
        if (Cart::count() < 1) {
            return back()->with('alert-type', 'error')->with('message', 'Cart is empty!');
        }

        $cart_items = Cart::content();
        return(view('frontend.checkout.index',compact('cart_items')));
    }

    public function checkout(OrderRequest $request)
    {

        $order_params = $request->only(['address', 'fullname', 'phone', 'email','total', 'note']);
        $order_params['status'] = self::DEFAULT_STATUS;
        $order_items = array();

        foreach(Cart::content() as $item) {
            $order_item = new OrderItem([
                'product_id'     => $item->id,
                'product_sku_id' => $item->options->product_sku_id,
                'quantity'       => $item->qty,
                'price'          => $item->price,
                'subtotal'       => $item->subtotal
            ]);
            array_push($order_items, $order_item);
        }

        try {
            DB::beginTransaction();
            $order = Auth::user()->orders()->save(new Order($order_params));
            $order->order_items()->saveMany($order_items);
            DB::commit();

            Cart::destroy();
            return redirect('/')->with('message', 'Create order successful');
        } catch(\Exception $e) {
            DB::rollback();
            return back()->with('alert-type', 'error')->with('message', 'Create order failed');
        }
    }
}
