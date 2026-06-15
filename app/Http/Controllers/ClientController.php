<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\pages;
use App\Models\order;
use App\Models\cart;
use App\Models\user_logs;
use App\classes\Agent;
use Illuminate\Http\Request;
use App\Models\item_quantity;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Log;

class ClientController extends Controller
{
    public function show_menu(career $career, $slug = null)
    {
        $menus = $career->menus;
        foreach ($menus as $menu) {
            foreach ($menu->menu_items as $item) {
                if ($item->discount > 0) {
                    $campare = $item->price - $item->discount;
                    $x = $campare / $item->price;
                    $item['percent'] = intval($x * 100);
                }
                $cartItem = cart::where('user_id', Auth::id())->where('menu_item_id', $item->id)->where('career_id', $career->id)->where('order_id', null)->first();
                if($cartItem){
                    $item->quantity = $cartItem->quantity;
                }
                $today = explode(' ', Verta::today());
                $today = $today[0];
                $itemQuantity = item_quantity::where('menu_item_id', $item->id)->where('date', $today)->where('quantity', $item->max_unit)->first();
                if($itemQuantity){
                    $item->outNumber = true;
                }
                // Log::info($item);
            }
        }
        $cartCount = 0;
        $orders = null;
        $career->qr_codes;
        $currentUser = null;
        if (Auth::check()) {
            $currentUser = Auth::user();
            $currentUser->load(['carts' => function ($query) use ($career) {
                $query->whereNull('order_id')->where('career_id', $career->id)->get();
            }]);
            foreach ($currentUser->carts as $cart) {
                $cartCount += $cart->quantity;
            }
            // $orders = order::where('user_id', Auth::id())->where('career_id', $career->id)->where('order_status_id', 1)->orWhere('order_status_id', 2)->orWhere('order_status_id', 3)->orWhere('order_status_id', 4)->get();
            $orders = order::where('user_id', Auth::id())->where('career_id', $career->id)->whereNotIn('order_status_id', [5, 6])->get();
        }
        $career->province = $career->province_city->province->title;
        $career->city = $career->province_city->title;
        return view('newMenu', ['career' => $career, 'slug' => $slug, 'cartCount' => $cartCount, 'currentUser' => $currentUser, 'orders'=>$orders]);
            // return view('client.menu', ['career' => $career, 'slug' => $slug, 'cartCount' => $cartCount, 'currentUser' => $currentUser, 'orders'=>$orders]);
    }

    public function storeLog(Request $request, pages $page){
        $agent = new Agent;
        $response = user_logs::create([
            'user_id'=>Auth::check() ? Auth::id() : null,
            'ip'=>$request->ip(),
            'is_mobile'=> $agent->isMobile() ? 1 : 0,
            'browser'=>$agent->browser(),
            'platform'=>$agent->platform(),
            'page_id'=>$page->id
        ]);
    }
        
    public function loadLink(pages $pages, $slug = null)
    {
        Log::info('pages');
        $pages->count += 1;
        $pages->save();
        $user = $pages->user;
        $user->scan_count += 1;
        $user->save();
        $request = request();
        // Http::post(route('store.log'));
        $this->storeLog($request, $pages);
        // $introCats = $pages->introCats()->where('title', '!=', 'بدون دسته بندی')->get();
        // $introPros = $pages->introPros;
        // return view('client.link.single', ['page' => $pages, 'slug' => $slug, 'introCats' => $introCats, 'introPros' => $introPros]);
        // return view('client.link.single', ['page' => $pages, 'slug' => $slug]);
        // dd($pages);
        return to_route('client.loadPage', [$pages, $slug]);
    }

    public function loadPage(pages $page, $slug = null){
    
        return view('client.link.single', ['page' => $page, 'slug' => $slug]);
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
