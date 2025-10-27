<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\career;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;



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
        $type=$request->logo->getClientOriginalExtension();
        $path=$request->logo->storeAs('files',$name,'public');
        $social_medias=json_encode($request->social_medias);
        career::insert(['title'=>$request->title,'logo'=>$path,'province'=>$request->province,'city'=>$request->city,'address'=>$request->address,'social_media'=>$social_medias,'user_id'=>$user->id,'email'=>$request->email,'description'=>$request->description,'user_name'=>$request->user_name]);
        //  QrCode::size(200)->generate($request->qrCode);
        return view("users.userPanel",["user"=>$user]);
    }
    public function show($id){
        $user=user::find($id);
        $career=career::where('user_id',$user->id)->first();
        // dd($user);
        return view("careers.show",["user"=>$user,"career"=>$career]);

    }
}
