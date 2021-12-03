<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Order;

class VnpayController extends Controller
{
    public function create(Request $request)
    {
        session()->push('id_bill',session('id'));
        $vnp_TmnCode = "AQ4UZ1XK";
        $vnp_HashSecret = "SXFCJOUEQELSWJWVJCVXGOCEIMHZSXSA";
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('return-vnpay');
        $vnp_TxnRef = date("YmdHis");
        $vnp_OrderInfo = "payment bill";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = Cart::total() * 23000 * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function return(Request $request)
    {
        if ($request->vnp_ResponseCode == "00") {
            //$this->apSer->thanhtoanonline(session('cost_id'));
            $id_bill = session('id_bill');
            $order = Order::find($id_bill);
            if($order[0]->status == 0 ){
                $order[0]->update(['status' => 1]);
            }
            Cart::destroy();
            session()->forget('id_bill');
            return redirect('/')->with('message', 'order successful');
        }
        session()->forget('url_prev');
        return redirect('/')->with('alert-type', 'error')->with('message', 'Create order failed');
    }
}
