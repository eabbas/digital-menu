<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\pages;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function show_menu(career $career, $slug = null)
    {
        // $campare = $product->price->price - $product->price->discount;
        // $x = $campare / $product->price->price;
        // $persent = $x * 100;

        // $user = $career->user;
        // $user->scan_count += 1;
        // $user->save();
        // set qr count in qrcode controller load method
        $order = null;
        if(Auth::check()){
            $order = order::where('user_id',Auth::id())->where('status',1)->first();
        }
        $menus = $career->menus;
        foreach ($menus as $menu) {
            foreach ($menu->menu_categories as $category) {
                foreach ($category->menu_items as $item) {
                    $campare = $item->price - $item->discount;
                    $x = $campare / $item->price;
                    $item['percent'] = intval($x * 100);

                }
            }
        }
        $cartCount = 0;

        $currentUser = null;
        if(Auth::check()){
            $currentUser = Auth::user();
            $currentUser->load(['carts' => function ($query) {
                $query->whereNull('order_id');
            }]);
            foreach ($currentUser->carts as $cart) {
                $cartCount += $cart->quantity;
            }
        }


        return view('client.menu', ['career' => $career, 'slug' => $slug, 'cartCount'=>$cartCount, 'order'=>$order , 'currentUser'=>$currentUser]);
    }

    public function loadLink(pages $pages, $slug = null)
    {
        $user = $pages->user;
        $user->scan_count += 1;
        $user->save();
        return view('client.link.single', ['page' => $pages, 'slug' => $slug]);
    }

    public function show_career(career $career)
    {
        return view('client.career.single', ['career' => $career]);
    }
}
