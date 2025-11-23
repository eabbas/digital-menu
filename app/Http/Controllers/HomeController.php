<?php

namespace App\Http\Controllers;

use App\Models\careerCategory;
use Illuminate\Http\Request;
use App\Models\slider;
use App\Models\career;
class HomeController extends Controller
{
    public function index(){
        $sliders = slider::all();
        $careerCategories = careerCategory::all();
        $careers = career::all();
        return view('home', ['sliders'=>$sliders ,'careerCategories'=>$careerCategories, 'careers'=>$careers]);
    }
    public function search(Request $request)
    {
        $careerTitles = career::where('title' , $request->search)->get();
        // dd($request->search);
        return view('client.search.index' , ['careerTitles'=>$careerTitles]);
    }
}
