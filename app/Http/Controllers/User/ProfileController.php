<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Requests\UserRequest;
Use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('frontend.pages.profile.show',compact('orders'));
    }

    public function edit()
    {
        return view('frontend.pages.profile.edit');
    }

    public function update(UserRequest $request )
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user_params = $request->only(['name', 'phone', 'address', 'birthday']);

        if ($request->hasFile('image')) {
            $file_path_with_name= 'uploads/user/' . $user->id .'-' . time() . '.' .$request->file('image')->extension();
            $request->file('image')->storeAs('public',$file_path_with_name);
            $user_params['image'] = $file_path_with_name;
        }
        $user->update($user_params);
        return back()->withInput();
    }

    public function orderHistory($id){
        $total = Order::where('id',$id)->value('total');

        $orderItems = OrderItem :: where ('order_id', $id)
        ->join('product_skus','order_items.product_sku_id','=','product_skus.id')
        ->join ('products','order_items.product_id','=','products.id')
        ->select('product_skus.product_id','order_items.quantity','subtotal','sku','image','order_items.price','sale_price','name')
        ->get();
        return view('frontend.order_history.order_detail', compact('orderItems','total','id'));
    }
}
