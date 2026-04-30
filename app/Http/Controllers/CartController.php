<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class CartController extends Controller
{
    public function store(Request $request)
    {
    //    return response()->json($request->all());
        $user_id = Auth::id();
        if (!Auth::check()) {
            $user_id = $request->input('user_id');
        }

        $cart = cart::create([
            'career_id' => $request->career_id,
            'menu_item_id' => $request->menu_item_id,
            'user_id' => $user_id,
            'quantity' => $request->quantity ? $request->quantity : 1,
        ]);
        return response()->json($cart);
    }

    function update(Request $request)
    {
        // return response()->json($request->all());
        $user_id = $request->input('user_id');
        if (Auth::check()) {
            $user_id = Auth::id();
        }
        $cart = cart::where(['career_id' => $request->career_id, 'menu_item_id' => $request->menu_item_id, 'user_id' => $user_id, 'order_id' => null])->first();
        $cart->quantity = $request->quantity ? $request->quantity : 1;
        $cart->save();
//        return response()->json([$cart, $cart->quantity, $request->quantity]);
        return response()->json($cart);
    }

    public function showCarts(Request $request)
    {
//        return response()->json($request->all());
        $user = null;
        if (isset($request->user_id)) {
            $user = User::find($request->user_id);
        }
        if (Auth::check()) {
            $user = Auth::user();
        }
        $data = $user->load(['carts' => function ($query) {
            $query->whereNull('order_id')->with('menu_item')->get();
        }]);
//        return response()->json($data->carts);
        $datas = [];
        foreach ($data->carts as $cart) {
            Log::info($cart);
            $cart->menu_item['quantity'] = $cart->quantity;
            $cart->menu_item['cart_id'] = $cart->id;
//            $cart->menu_item['quantity'] = $cart->quantity;
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

    public function delete(Request $request)
    {
        $cart = cart::where('menu_item_id', $request->menu_item_id)->where('user_id', $request->user_id)->first();
        $data = $cart;
        $cart->delete();
        return response()->json($data);
    }

    public function deleteAll(Request $request){
        foreach ($request->cart_ids as $menu_item_id) {
            $cart = cart::where('menu_item_id', $menu_item_id)->where('user_id', $request->user_id)->first();
            $cart->delete();
        }
        return response()->json($request->cart_ids);
    }
}
