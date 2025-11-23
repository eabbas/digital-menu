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
        return to_route('favoriteCareer.list');
    }
    public function index(){
        $favoriteCareers=favoriteCareer::where('user_id',Auth::id())->get();
        $careers=null;
        foreach($favoriteCareers as $favoriteCareer){
            $careers[]=career::find($favoriteCareer->career_id);
        }
        if($careers){
            return view('admin.favoriteCareer.index',['careers'=>$careers]);
        }
        return to_route('user.profile', [Auth::user()]);        
    }
    public function delete(career $career){
        $favoriteCareer=favoriteCareer::where('career_id',$career->id)->first();
        $favoriteCareer->delete();
        return to_route('favoriteCareer.list');
    }
}
