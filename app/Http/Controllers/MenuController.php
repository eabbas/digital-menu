<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\menu;
use App\Models\qr_code;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class MenuController extends Controller
{
    public function create($id){
    return view('menus.create',['career_id'=>$id]);
}
    public function store(Request $request){
        // dd($request->all());
        $page_data=json_encode($request->page_data);

        menu::insert(['page_date'=>$page_data,'career_id'=>$request->career_id]);
        
        $user_id=Auth::id();
        for($i=1;$i<=$request->qr_num;$i++){

          $random = Str::random(10);
          $link = "/famenu.ir/QRCode/$user_id/".$random;
          $qr_svg=QrCode::size(100)->generate($link);
          $fileName = "qrcodes/".$user_id."_".$random.".svg";
           $QRpath = Storage::disk('public')->put($fileName,$qr_svg);
           qr_code::create(['qr_pass'=>$QRpath,'career_id'=>$request->career_id,'is_main'=>0]);

        }
        
    }
}
