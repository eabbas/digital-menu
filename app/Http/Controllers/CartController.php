<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $cart = cart::create([
            'career_id' => $request->career_id,
            'menu_item_id' => $request->menu_item_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity ? $request->quantity : 1,
        ]);
        return response()->json($cart);
    }

    function update(Request $request){
        $cart = cart::where(['career_id'=>$request->career_id, 'menu_item_id'=>$request->menu_item_id, 'user_id'=>Auth::id(), 'order_id'=>null])->first();
        $cart->quantity = $request->quantity;
        $cart->save();
        return response()->json([$cart, $cart->quantity, $request->quantity]);
    }

    public function showcarts(Request $request)
    {
        $data = Auth::user()->load(['carts'=>function($query){
            $query->whereNull('order_id')->with('menu_item')->get();
        }]);
        $datas = [];
        foreach ($data->carts as $cart) {
            $cart->menu_item['quantity'] = $cart->quantity;
            $cart->menu_item['cart_id'] = $cart->id;
            $cart->menu_item['quantity'] = $cart->quantity;
            $datas[] = $cart->menu_item;
        }
        return response()->json($datas);
    }

    public function set(Request $request)
    {
        foreach ($request->carts as $cart_id) {
            $cart = cart::find($cart_id);
            $cart->status = 1;
            $cart->save();
        }
        return response()->json($cart);
    }

    public function delete(Request $request){
        $cart = cart::where(['menu_item_id'=>$request->menu_item_id, 'user_id'=>Auth::id()])->first();
        $cart->delete();
        return response()->json('ok');
    }
}
