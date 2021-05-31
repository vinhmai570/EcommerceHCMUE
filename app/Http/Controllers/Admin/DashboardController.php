<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.dashboard.index');
    }

    public function filterByDate(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Order::whereBetween('orders.created_at', [$from_date, $to_date])
         ->join('order_items', 'order_items.order_id' , '=' , 'orders.id' )
         ->whereRaw('DATE( orders.created_at)','DATE( order_items.created_at)')
         ->select(DB::raw('sum(quantity) as quantity, DATE( orders.created_at) as order_date, count(order_id) as total_order, SUM(orders.total) as total_price'))
         ->groupByRaw('DATE(orders.created_at)')
         ->orderByRaw('DATE(orders.created_at)' , 'ASC')
         ->get();

        foreach ($get as $key => $val){
            $chart_data[] = array(
                'period'    => $val -> order_date,
                'order'     => $val -> total_order,
                'sales'     => $val -> total_price,
                'profit'    => $val -> total_price * 15/100,
                'quantity'  => $val -> quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
}
