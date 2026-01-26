<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\cart;
use App\Models\address;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request){
        $cartDetails=[];
        $cartNumber = sprintf('%010d', random_int(0, 9999999999));
        foreach($request->carts as $cart_id){
            $cart=cart::find($cart_id);
            $cart->status = 1;
            $cart->cartNumber = $cartNumber;
            $cart->show_for_customer = 0;
            $cart->save();
//            return response()->json($cart);
            $cartDetails['cartNumber']=$cartNumber;
            $cartDetails['address_id']=$request->address;
            $cartDetails['user_id']=Auth::id();
            $cartDetails['career_id']=$cart->career_id;
        }
        $order = order::create($cartDetails);
        return response()->json($order);
    }
}
