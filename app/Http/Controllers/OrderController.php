<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    const DEFAULT_STATUS = 1;

    public function checkout(Request $request)
    {
        $order_params = $request->only(['address', 'fullname', 'phone', 'total', 'note']);
        $order_params['status'] = self::DEFAULT_STATUS;
        $order_items = array();

        foreach(Cart::content() as $item) {
            $order_item = new OrderItem([
                'product_id' => $item->id,
                'product_sku_id' => $item['options']['product_sku_id'],
                'quantity' => $item->qty,
                'price' => $item->price,
                'subtotal' => $item->subtotal
            ]);
            array_push($order_items, $order_item);
        }

        $order = Auth::user()->orders()->save(new Order($order_params));
        $order->order_items()->saveMany($order_items);

        return back()->with('message', 'Create order successful');
    }
}
