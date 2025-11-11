<?php

namespace App\Http\Controllers;
use App\Models\aboutUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
      public function create(){
        $user = Auth::user();
        return view('admin.aboutUs.create', ['user' => $user]);
    }
    public function upsert(Request $request){
         aboutUs::upsert([
            'title' => $request->title,
            'description' => $request->description],
            ['title'],
            ['description']);
        return view('admin.user.panel', [Auth::user()]);
    }
    public function index(){
        $allAboutUs=aboutUs::all();
        return view('admin.aboutUs.index',['allAboutUs' => $allAboutUs] );

    }
}
