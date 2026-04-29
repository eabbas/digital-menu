<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\pages;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

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
//        $order = null;
//        if (Auth::check()) {
//            $order = order::where('user_id', Auth::id())->where('status', 1)->first();
//        }
        $menus = $career->menus;
        foreach ($menus as $menu) {
            foreach ($menu->menu_categories as $category) {
                foreach ($category->menu_items as $item) {
                    if ($item->discount > 0) {
                        $campare = $item->price - $item->discount;
                        $x = $campare / $item->price;
                        $item['percent'] = intval($x * 100);
                    }
                }
            }
        }
        $cartCount = 0;
        $orders = null;
        $career->qr_codes;
        $currentUser = null;
        if (Auth::check()) {
            $currentUser = Auth::user();
            $currentUser->load(['carts' => function ($query) {
                $query->whereNull('order_id');
            }]);
            foreach ($currentUser->carts as $cart) {
                $cartCount += $cart->quantity;
            }
            $orders = order::where('user_id', Auth::id())->where('career_id', $career->id)->where('status', 1)->orWhere('status', 2)->orWhere('status', 3)->get();
        }
//        dd($orders);
//        foreach ($career as $item) {
//            log::info($item);
//        }

        return view('client.menu', ['career' => $career, 'slug' => $slug, 'cartCount' => $cartCount, 'currentUser' => $currentUser, 'orders'=>$orders]);
    }

    public function loadLink(pages $pages, $slug = null)
    {
        $user = $pages->user;
        $user->scan_count += 1;
        $user->save();
        $introCats = $pages->introCats()->where('title', '!=', 'بدون دسته بندی')->get();
        $introPros = $pages->introPros;
        return view('client.link.single', ['page' => $pages, 'slug' => $slug, 'introCats' => $introCats, 'introPros' => $introPros]);
    }

    public function show_career(career $career)
    {
        return view('client.career.single', ['career' => $career]);
    }

    public function allPages()
    {
        $pages = pages::all();
        return view('client.link.index', ['pages' => $pages]);
    }
}
