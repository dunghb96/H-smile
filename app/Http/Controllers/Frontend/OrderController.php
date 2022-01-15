<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderController extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }

    public function detail($id)
    {
        $orderOne = Order::find($id);
        $orderDetailOne = Order::find($id)->orderdetail;
        $infoPatien = Patient::where('patient_code', $orderOne->customer_id)->first();
        session(['order_id' => $id]);

//        $patient_code = Cookie::get('patient_code');
//        $orderByPatient = Order::where('customer_id', $patient_code)->get();
        return view('Frontend.order.detail', compact('orderOne', $orderOne, 'orderDetailOne', $orderDetailOne, 'infoPatien', $infoPatien));
    }


    public function payOrder($id)
    {
        $order = Order::find($id);
        $json = json_decode(file_get_contents("https://botsms.net/api/his_autobank_limit?url_callBack=http://hsmile.xyz&limit=99999999"), true);
        $pay_content = $order->pay_content;
        $total_price = $order->total_price;

        foreach ($json as $key => $val) {
            if ($val['content_bank'] == $pay_content && $val['money'] == $total_price) {
                $order->status = 2;
                $order->save();
            }
        }

        return $order;

    }


    public function bankSuccess(){
        return view('frontend.order.bankSuccess');
    }


}
