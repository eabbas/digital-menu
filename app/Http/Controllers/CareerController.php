<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\career;
use App\Models\qr_code;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;




class CareerController extends Controller
{
    public function create(){
        return view('careers.create');
    }
    
    public function store(Request $request){
        $user=Auth::user();
        $user->type="career";
        $user->save();
        $name=$request->logo->getClientOriginalName();
        // dd($user , $request->all());
        // $type=$request->logo->getClientOriginalExtension();
        $path=$request->logo->storeAs('files',$name,'public');
        $social_medias=json_encode($request->social_medias);
        $random = Str::random(10);
        $link = "https://famenu.ir/QRCode/$user->id/".$random;
        $qr_svg=QrCode::size(100)->generate($link);
        $fileName = "qrcodes/".$user->id."_".$random.".svg";
        Storage::disk('public')->put($fileName, $qr_svg);
        $career_id=career::insertGetId([
            'title'=>$request->title,
            'logo'=>$path,
            'province'=>$request->province,
            'city'=>$request->city,
            'address'=>$request->address,
            'social_media'=>$social_medias,
            'user_id'=>$user->id,
            'email'=>$request->email,
            'description'=>$request->description,
            'user_name'=>$request->user_name
        ]);
        // dd($career);

        qr_code::create(['qr_pass'=>$fileName,'career_id'=>$career_id,'is_main'=>1]);
        return view("users.userPanel",["user"=>$user]);
    }
    public function user_careers(user $user){
        return view("careers.userCareers",["user"=>$user]);

    }
}
