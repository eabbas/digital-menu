<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\custom_product_variant;
use Illuminate\Support\Facades\Storage;
use App\Models\custom_product;
use App\Models\career;

class CustomProductVariantController extends Controller
{
    public function create(career $career ,custom_product $custom_product)
    {
        // dd($custom_product->id);
        return view('admin.customProductVariants.create' , ['career'=>$career , 'custom_product'=>$custom_product]);
    }
    public function store(Request $request)
    {
        $path = null;
        if(isset($request->image)){
            // dd($request->all());

            $name = $request->image->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
        }
        custom_product_variant::create([
            'title'=>$request->title ,
            'min_amount_unit' => $request->min_amount_unit ,
            'duration' => $request->duration ,
            'custom_product_id' => $request->custom_product_id ,
            'description' => $request->description ,
            'image' => $path
        ]);
        return to_route('cpv.list' , [$request->career_id , $request->custom_product_id]);
    }
    public function index(career $career , custom_product $customProduct)
    {
       return view('admin.customProductVariants.index', ['customProduct'=>$customProduct , 'career'=>$career]);
    }
    public function show(custom_product_variant $cpVariants)
    {
        return view('admin.customProductVariants.single' , ['cpVariants'=>$cpVariants]);
    }
    public function edit(custom_product_variant $cpVariants,career $career,custom_product $customProduct)
    {
        // dd($career);
        return view('admin.customProductVariants.edit' , ['cpVariants'=>$cpVariants ,'career'=>$career ,'customProduct'=>$customProduct]);
    }
    public function update(Request $request)
    {
        // dd($request->all());
       $cpv = custom_product_variant::find($request->id);
       $cpv->title = $request->title;
       $cpv->description = $request->description;
       $cpv->min_amount_unit = $request->min_amount_unit;
       $cpv->duration = $request->duration;
       $cpv->custom_product_id = $request->custom_product_id;

       if(isset($request->image)){
            Storage::disk('public')->delete($cpv->image);
            $name = $request->image->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
            $cpv->image = $path;
        }

       $cpv->save();
       return to_route('cpv.list' , [$request->career_id]);
    }
    public function delete(custom_product_variant $cpVariants , career $career , custom_product $customProduct)
    {
        Storage::disk('public')->delete($cpVariants->image);
        $cpVariants->delete();
       return to_route('cpv.list' , [$career , $customProduct]);
    }
}
