<?php

namespace App\Http\Controllers;
use App\Models\aboutUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
      public function create_edit($id=null){
        $user = Auth::user();
        return view('admin.aboutUs.create', ['user' => $user ,'id'=>$id]);
    }
    public function updateOrcreate(Request $request){
        if ($request->id){
            aboutUs::upsert([
                'id' => $request->id,
                'title' => $request->title,
                'description' => $request->description],
                ['id'], // unique
                ['title','description']);
        }else{
            aboutUs::upsert([
                'title' => $request->title,
                'description' => $request->description],
                ['id'],
                ['title','description']);
        }
        return to_route('aboutUs.list');
    }
    public function index(){
        $allAboutUs=aboutUs::all();
        return view('admin.aboutUs.index',['allAboutUs' => $allAboutUs] );
    }
     public function delete(aboutUs $aboutUs)
    {
        $aboutUs->delete();
        return redirect('/aboutUs/aboutUs');
    }
}
