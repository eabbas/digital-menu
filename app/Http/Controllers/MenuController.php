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
    public function create(career $career)
    {
        $user = Auth::user();
        return view('menu.create', ['user'=>$user, 'career'=>$career]);
    }

    public function store(Request $request)
    {
        $career_id = $request->career_id;
        $page_data = json_encode($request->page_data);
        $menu_id = menu::insertGetId(['page_data' => $page_data, 'qr_num'=>$request->qr_num, 'career_id' => $career_id]);
        // $user_id = Auth::id();
        for ($i = 1; $i <= $request->qr_num; $i++) {
            $random = Str::random(10);
            $link = "/famenu.ir/qrcode/$career_id/" . $random;
            $qr_svg = QrCode::size(100)->generate($link);
            $fileName = 'qrcodes/' . $career_id . '_' . $random . '.svg';
            Storage::disk('public')->put($fileName, $qr_svg);
            qr_code::create(['qr_path' => $fileName, 'career_id' => $career_id, 'is_main' => 0, 'menu_id'=>$menu_id, 'slug'=>$career_id.'/'.$random]);
        }
        return to_route('user.career.careers');
    }

    public function index(career $career){
        $user = Auth::user();
        $career->menu->page_data;
        return view('menu.menu', ['career'=>$career, 'user'=>$user]);
    }

    public function edit(menu $menu){
        $user = Auth::user();
        return view('menu.edit', ['menu'=>$menu, 'user'=>$user]);
    }

    public function update(Request $request){
        $menu = menu::find($request->menu_id);
        $menu->page_data = json_encode($request->page_data);
        $menu->career_id = $request->career_id;
        $qr_count = 0;
        $career_id = $menu->career_id;
        if ($request->qr_num>$menu->qr_num) {
            $qr_count = $request->qr_num - $menu->qr_num;
            while ($qr_count) {
                $random = Str::random(10);
                $link = "/famenu.ir/QRCode/$career_id/" . $random;
                $qr_svg = QrCode::size(100)->generate($link);
                $fileName = 'qrcodes/' . $career_id . '_' . $random . '.svg';
                Storage::disk('public')->put($fileName, $qr_svg);
                qr_code::create(['qr_path' => $fileName, 'career_id' => $career_id, 'is_main' => 0, 'menu_id'=>$request->menu_id, 'slug'=> $career_id.'/'.$random]);
                $qr_count--;
            } 
        }
        $menu->qr_num = $request->qr_num;
        $menu->save();
        $user = Auth::user();
        return to_route('user.profile', [$user]);
    }

    public function delete(menu $menu){
        $user = Auth::user();
        foreach($menu->qr_codes as $qr_code){
            Storage::disk('public')->delete($qr_code->qr_path);
            $qr_code->delete();
        }
        $menu->delete();
        return to_route('user.profile', [$user]);
    }
}
