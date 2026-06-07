<?php

namespace App\Http\Controllers;

use App\Models\qr_code;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request){
        $user_id = Auth::id();
        if(isset($request->user_id)){
            $user_id = $request->user_id;
        }
        $qr_code_id = null;
        if(isset($request->slug)){
            $qr_code_id = qr_code::where('slug', $request->slug)->first()->id;
        }
        $order_id = order::insertGetId([
            'address_id' => isset($request->address) ? $request->address : null,
            'user_id' => $user_id,
            'qr_code_id' => $qr_code_id,
            'career_id' => $request->career_id,
            'order_status_id'=>1,
            'order_code'=>0,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        $order_code = "100".$order_id;
        order::where('id', $order_id)->update(['order_code' => $order_code]);
        foreach($request->carts as $cart_id){
            $cart=cart::find($cart_id);
            $cart->order_id = $order_id;
            $cart->save();
        }
        return response()->json('ok');
    }

    public function show(Request $request){
        $user_id = Auth::id();
        if(isset($request->user_id)){
            $user_id = $request->user_id;
        }
        $datas = [];
        $orders = order::where('user_id', $user_id)->where('career_id', $request->career_id)->where('order_status_id', 1)->orWhere('order_status_id', 2)->orWhere('order_status_id', 3)->orWhere('order_status_id', 4)->get();
        foreach($orders as $order){
            if($order->address){
                $order['address'] =  $order->address;
            }
            if($order->qr_code_id){
                $order['table'] =  $order->qr_code->description ? $order->qr_code->description : "-";
            }
            $datas[] = $order;
        }
        return response()->json($datas);
    }

    public function showItems(order $order){
        $order->carts->load('menu_item');
        $order->qr_code;
        $order->status;
        return response()->json($order);
    }

    public function acceptOrder(Request $request)
    {
        $order = order::find($request->order_id);

        if($request->status == 1){
            $order->order_status_id = 2;
        }
        if($request->status == 2){
            $order->order_status_id = 3;
        }
        if($request->status == 3){
            $order->order_status_id = 4;
        }
        if($request->status == 4){
            $order->order_status_id = 5;
        }
        if($request->status == 5){
            $order->order_status_id = 6;
        }
        $order->status;
        $order->qr_code;
        $order->carts;
        $order->save();
        return response()->json($order);
    }

    public function delete(order $order){
        $order->update(['order_status_id'=>6]);
        return response()->json($order->id);
    }
}
