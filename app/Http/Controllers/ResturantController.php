<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResturantController extends Controller
{
    public function create(){
        //   $social_medias=social_media::all();
        return view('resturants.create');
    }
    public function profile(){
                //   $social_medias=social_media::all();
                    //  return view('resturants.profile',['social_medias'=>$social_medias]);
                     return view('resturants.profile');
    }
    public function profileStore(Request $request){
        // dd($request->all());
        // dd($social_medias);
        $resturant=Auth::user();
        $name=$request->logo->getClientOriginalName();
        $type=$request->logo->getClientOriginalExtension();
        $path=$request->logo->storeAs('files',$name,'public');
        $resturant->logo=$path;
        $resturant->name=$request->name;
        $resturant->province=$request->province;
        $resturant->city=$request->city;
        $resturant->address=$request->address;
        $social_medias=json_encode($request->social_medias);
       $resturant->social_media=$social_medias;
       $resturant::save();

      

    }
}
