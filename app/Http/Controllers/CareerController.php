<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\career;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;



class CareerController extends Controller
{
    public function create(){
        //   $social_medias=social_media::all();
        return view('careers.create');
    }
    
    public function store(Request $request){
        // dd($request->all());
        // dd($social_medias);
        
        // dd($social_medias);
        $user=Auth::user();
        $name=$request->logo->getClientOriginalName();
        $type=$request->logo->getClientOriginalExtension();
        $path=$request->logo->storeAs('files',$name,'public');
        $social_medias=json_encode($request->social_medias);
        career::insert(['title'=>$request->title,'logo'=>$path,'province'=>$request->province,'city'=>$request->city,'address'=>$request->address,'social_media'=>$social_medias,'user_id'=>$user->id,'email'=>$request->email,'description'=>$request->description,'user_name'=>$request->user_name]);
        //  QrCode::size(200)->generate($request->qrCode);


      

    }
}
