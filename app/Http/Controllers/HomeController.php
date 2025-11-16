<?php

namespace App\Http\Controllers;

use App\Models\careerCategory;
use Illuminate\Http\Request;
use App\Models\slider;

class HomeController extends Controller
{
    public function index(){
        $sliders = slider::all();
        $careerCategories = careerCategory::all();
        // dd($careerCategories);
        return view('home', ['sliders'=>$sliders ,'careerCategories'=>$careerCategories]);
    }
}
