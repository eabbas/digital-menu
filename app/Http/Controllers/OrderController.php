<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\order;
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
}
