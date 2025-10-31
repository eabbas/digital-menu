<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\menu;
use App\Models\qr_code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class MenuController extends Controller
{
    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $career_id = $user->careers[0]->id;
        // dd($request->all());
        $page_data = json_encode($request->page_data);
        menu::create(['page_data' => $page_data, 'qr_num'=>$request->qr_num, 'career_id' => $career_id]);
        $user_id = Auth::id();
        for ($i = 1; $i <= $request->qr_num; $i++) {
            $random = Str::random(10);
            $link = "/famenu.ir/QRCode/$user_id/" . $random;
            $qr_svg = QrCode::size(100)->generate($link);
            $fileName = 'qrcodes/' . $user_id . '_' . $random . '.svg';
            Storage::disk('public')->put($fileName, $qr_svg);
            qr_code::create(['qr_pass' => $fileName, 'career_id' => $career_id, 'is_main' => 0]);
        }
        return to_route('menu.list');
    }

    public function index(){
        $user = Auth::user();
        $career = $user->careers[0];
        $x = $career->menus[0]->page_data;
        // dd(json_decode($x));
        return view('menu.menu', ['career'=>$career]);
    }

    public function edit(menu $menu){}
}
