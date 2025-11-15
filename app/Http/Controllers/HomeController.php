<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;

class HomeController extends Controller
{
    public function index(){
        $sliders = slider::all();
        return view('home', ['sliders'=>$sliders]);
    }
}
