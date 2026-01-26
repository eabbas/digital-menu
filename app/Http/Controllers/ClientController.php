<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\covers;
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
        if (Auth::check()) {
            if (count(Auth::user()->carts)) {
                foreach (Auth::user()->carts as $cart) {
                    $cartCount += $cart->quantity;
                }
            }
        }
        return view('client.menu', ['career' => $career, 'slug' => $slug, 'cartCount'=>$cartCount]);
    }

    public function loadLink(covers $covers, $slug = null)
    {
        $user = $covers->user;
        $user->scan_count += 1;
        $user->save();
        return view('client.link.single', ['cover' => $covers, 'slug' => $slug]);
    }

    public function show_career(career $career)
    {
        return view('client.career.single', ['career' => $career]);
    }
}
