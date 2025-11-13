<?php
namespace App\Http\Controllers;
use App\Models\slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
            return to_route('slider.list', ['user' => $user]);
    }
    public function index(){
        $sliders=slider::all();
        return view('admin.slider.index', ['sliders' => $sliders]);

    }
    public function edit(slider $slider){
         $user = Auth::user();
        return view('admin.slider.edit', ['slider' => $slider ,['user' => $user]]);

    }
     public function update(Request $request){
          $slider = slider::find($request->id);
        if ($request->slider_img) {
            Storage::disk('public')->delete($slider->slider_img);
            $name = $request->slider_img->getClientOriginalName();
            $path = $request->slider_img->storeAs('sliders', $name, 'public');
            $slider->slider_img = $path;
        }
        $slider->title = $request->title;
        $slider->save();
        return redirect('/slider/sliders');
    }
     public function delete(slider $slider)
    {
        $slider->delete();
        return redirect('/slider/sliders');
    }

}
