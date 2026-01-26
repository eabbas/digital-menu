<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\career;
use App\Models\qr_code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
//        return response()->json($request->all());
        $qrcode_id = null;
        if ($request->slug) {
            $qrcode = qr_code::where('slug', $request->slug)->first();
            $qrcode_id = $qrcode->id;
        }

        $cart_id = cart::upsert([
            'career_id' => $request->career_id,
            'qr_code_id' => $qrcode_id,
            'menu_item_id' => $request->menu_item_id,
            'user_id' => Auth::id(),

            'quantity' => $request->quantity ? $request->quantity : 1,
        ], [
            'user_id', 'menu_item_id'
        ], [
            'career_id', 'qr_code_id', 'quantity'
        ]);
        $cart = cart::find($cart_id);
        return response()->json($cart);
    }

    public function showcarts(Request $request)
    {
        $career = career::find($request->career_id);
        $data = [];
        foreach (Auth::user()->carts as $cart) {
            $cart->menu_item['quantity'] = $cart->quantity;
            $cart->menu_item['cart_id'] = $cart->id;
            $data[] = $cart->menu_item;
        }
        return response()->json($data);
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
}
