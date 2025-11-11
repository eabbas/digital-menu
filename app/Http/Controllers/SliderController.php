<?php
namespace App\Http\Controllers;
use App\Models\slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function create(){
        $user = Auth::user();
        return view('admin.slider.create', ['user' => $user]);
    }
    public function store(Request $request){
    $user = Auth::user();
    $name = $request->slider_img->getClientOriginalName();
    $path = $request->slider_img->storeAs('sliders', $name, 'public');
     slider::create([
            'title' => $request->title,
            'slider_img' => $path,
     ]);
            return to_route('user.profile', ['user' => $user]);
    }
}
