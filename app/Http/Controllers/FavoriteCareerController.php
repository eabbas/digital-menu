<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\favoriteCareer;
use App\Models\career;

class FavoriteCareerController extends Controller
{
    public function create($careerId){
        $user_id=Auth::id();
        favoriteCareer::create(['user_id'=>$user_id,'career_id'=>$careerId]);
    }
    public function index(){
        $favoriteCareers=favoriteCareer::where('user_id',Auth::id())->get();
        foreach($favoriteCareers as $favoriteCareer){
            $careers=career::find($favoriteCareer->career_id);
        
        }

        return view('admin.favoriteCareer.index',['career'=>$career]);
    }
    public function delete(career $career){
        $favoriteCareer=favoriteCareer::find($career->id);
        $favoriteCareer->delete();
    }
}
