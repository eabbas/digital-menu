<?php

namespace App\Http\Controllers;

use App\Models\qr_code;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request){
        $qr_code_id = null;
        if(isset($request->slug)){
            $qr_code_id = qr_code::where('slug', $request->slug)->first()->id;
        }
        $order_code = sprintf('%010d', random_int(0, 9999999999));
        $order_id = order::insertGetId([
            'address_id' => isset($request->address) ? $request->address : null,
            'user_id' => Auth::id(),
            'qr_code_id' => $qr_code_id,
            'career_id' => $request->career_id,
            'status'=>1,
            'order_code'=>$order_code,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        foreach($request->carts as $cart_id){
            $cart=cart::find($cart_id);
            $cart->order_id = $order_id;
            $cart->save();
        }
        return response()->json('ok');
    }

    public function show(Request $request){
        $datas = [];
        foreach(Auth::user()->orders as $order){
            if($order->address){
                $order['address'] =  $order->address;
            }
            if($order->qr_code_id){
                $order['table'] =  $order->qr_code->description ? $order->qr_code->description : "-";
            }
            if($order->status == 1){
                $order['status'] = "در انتظار تایید";
            }
            if($order->status == 2){
                $order['status'] = "در حال آماده سازی";
            }
            if($order->status == 3){
                $order['status'] = "ارسال شد";
            }
            $datas[] = $order;
        }
        return response()->json($datas);
    }

    public function showItems(Request $request){
        $order = order::find($request->order_id);
        $data = $order->carts->load('menu_item');
        return response()->json($data);
    }
}
