<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request){
        $order = order::upsert([
            'career_id'=> $request->career_id,
            'slug'=> $request->slug ? $request->slug : null,
            'menu_item_id'=> $request->menu_item_id,
            'user_id'=>Auth::id(),
            'quantity'=> $request->quantity ? $request->quantity : 1,
        ],[
            'user_id', 'menu_item_id'
        ],[
            'career_id', 'slug', 'quantity'
        ]);
        return response()->json($request->quantity);
    }

    public function showOrders(Request $request){
        $career = career::find($request->career_id);
        $data = [];
        foreach(Auth::user()->orders as $key => $order){
            $order->menu_item['quantity']=$order->quantity;
            $order->menu_item['order_id']=$order->id;
            $data[]=$order->menu_item;
        }
        return response()->json($data);
    }

    public function set(Request $request){
        foreach($request->orders as $order_id){
            $order = order::find($order_id);
            return response()->json($order);
        }
    }
}
