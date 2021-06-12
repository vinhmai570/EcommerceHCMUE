<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Arr;

class OrderController extends Controller
{
    const ITEM_PER_PAGE = 12;

    public function index(Request $request)
    {
        if ($request->has('user_id')) {
            $orders = Order::where('user_id', '=', $request->user_id)->sortable()->paginate(self::ITEM_PER_PAGE);
        } else {
            $orders = Order::sortable()->paginate(self::ITEM_PER_PAGE);
        }

        return view('admin.order.index', compact('orders'));
    }

    public function detail($id)
    {
        $order_items = OrderItem ::where('order_id', $id)
        ->join('product_skus','order_items.product_sku_id','=','product_skus.id')
        ->join ('products','order_items.product_id','=','products.id')
        ->select('product_skus.product_id','order_items.quantity','subtotal','sku','image','order_items.price','sale_price','name')
        ->get();
        return view('admin.order.detail', compact('order_items'));
    }

    public function update($id)
    {
        $order = Order::find($id);
        if($order->status == 0 ){
            $order->update(['status' => 1]);
        }
        else{
            $order->update(['status' => 0]);
        }
        return back()->with('message', 'update status successful');
        echo ('hhh');
    }
}
