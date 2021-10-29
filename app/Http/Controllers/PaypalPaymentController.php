<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\OrderItem;
use App\Models\Order;
use Auth;
use Cart;

class PaypalPaymentController extends Controller
{

    const DEFAULT_STATUS = 0;

    public function create(Request $request)
    {
        
        $order_id = 0;
        $order_params = json_decode($request->getContent(), true);
        $order_params['status'] = self::DEFAULT_STATUS;
        $order_params['total'] = Cart::total(2, '.', '');
        $order_items = array();
        $paypal_items = array();

        foreach(Cart::content() as $item) {
            $order_item = new OrderItem([
                'product_id'     => $item->id,
                'product_sku_id' => $item->options->product_sku_id,
                'quantity'       => $item->qty,
                'price'          => $item->price,
                'subtotal'       => $item->subtotal
            ]);
            
            $paypal_item = [
                'name' => $item->name,
                'description' => 'Item #'.$item->id,
                'unit_amount' => [
                    'currency_code' => 'USD',
                    'value' => $item->price,
                ],
                'quantity' => $item->qty,
                'tax' => [
                    'currency_code' => 'USD',
                    'value' => $item->tax,
                ],
            ];

            array_push($order_items, $order_item);
            array_push($paypal_items, $paypal_item);
        }

        try {
            DB::beginTransaction();
            $order = Auth::user()->orders()->save(new Order($order_params));
            $order->order_items()->saveMany($order_items);
            DB::commit();
            $order_id = $order->id;
        } catch(\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'DB::Create order failed'], 500);
        }

        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);
        $order = $provider->createOrder([
            "intent"=> "CAPTURE",
            "purchase_units"=> [
                [
                    "amount"=> [
                        "currency_code"=> "USD",
                        "value"=> Cart::total(2, '.', ''),
                        "breakdown" => [
                            "item_total" => [
                                "currency_code" => "USD",
                                "value" => Cart::total(2, '.', ''),
                            ],
                        ],
                    ],
                    'description' => 'DAMA Shop Order #'.$order_id,
                    'items' => $paypal_items,
                ]
            ],
        ]);
        if (isset($order['type']) && $order['type'] =='error') {
            return response()->json(['error' => $order['message']], 500);
        }
        $order['order_id'] = $order_id;
        return response()->json($order);
    }

    public function capture(Request $request)
    {
        $orderID = $request->input('orderID');
        $paypalOrderID = $request->input('paypalOrderID');

        $provider = \PayPal::setProvider();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);
        $result = $provider->capturePaymentOrder($paypalOrderID);
        if (isset($result['type']) && $result['type'] =='error') {
            return response()->json(['error' => $result['message']], 500);
        }
        try {
            DB::beginTransaction();
            $order = Order::where('id', $orderID)->update(['status'=>1]);
            DB::commit();
            
            Cart::destroy();
            return response()->json($result);
        } catch(\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'DB::Pay order failed'], 500);
        }
    }

    public function cancel(Request $request)
    {
        $orderID = $request->input('orderID');
        try {
            DB::beginTransaction();
            $order = Order::where('id', $orderID)->update(['status'=>2]);
            DB::commit();
            
            return response(null, 200);
        } catch(\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'DB::Cancel order failed'], 500);
        }
    }
}
