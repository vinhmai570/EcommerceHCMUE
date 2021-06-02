<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Category;
use App\Models\User;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now ('Asia/Ho_Chi_Minh')->toDateString();
        $user = Auth::guard('admin')->user();
        $new_order = Order::where('status',0)->count();
        $total_profit = Order::all()->sum('total');
        $admin_quantity = Admin::all()->count();
        $user_quantity = User::all()->count();
        $order_Processing = Order::where('status', 0)->count();
        $order_done = Order::where('status', 1)->count();
        return view('admin.dashboard.index',compact('new_order','total_profit','user_quantity','admin_quantity','order_done','order_Processing'));
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

    public function monthly_chart(){
        $day = Carbon::now ('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
        $now = Carbon::now ('Asia/Ho_Chi_Minh')->toDateString();

        $get = Order::whereBetween('orders.created_at', [$day, $now])
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

    public function category_chart(){
        $cat_quantitys = Category::where('active', 1)
        ->join('products', 'categories.id', '=', 'products.category_id')
        ->select(DB::raw('categories.name as name, count(products.id) as quantity'))
        ->groupBy ('categories.id')
        ->get();

        foreach ($cat_quantitys as $key => $val){
            $chart_data[] = array(
                'name'    => $val -> name,
                'quantity'     => $val -> quantity,
            );
        }
        echo $data = json_encode($chart_data);
    }
}
