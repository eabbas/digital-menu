<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\custom_product_variant;
use Illuminate\Support\Facades\Storage;
use App\Models\custom_product;

class CustomProductVariantController extends Controller
{
    public function create()
    {
        $customProducts = custom_product::all();
        return view('admin.customProductVariants.create' , ['customProducts'=>$customProducts]);
    }
    public function store(Request $request)
    {
        
        if(isset($request->image)){
                $name = $request->image->getClientOriginalName();
                $fullName = time()."_".$name;
                $path = $request->file('image')->storeAs('images', $fullName, 'public');
                custom_product_variant::create(['image' => $path]);
            }
            custom_product_variant::create([
                'title'=>$request->title ,
                'description' => $request->description ,
                'custom_product_id' => $request->custom_product_id ,
                'duration' => $request->duration ,
                'min_amount_unit' => $request->min_amount_unit ,
            ]);
            return to_route('cpv.list');
        }
        public function index()
        {
       $cpVariants = custom_product_variant::with('custom_product')->get();
    //    dd($cpVariants);
       return view('admin.customProductVariants.index', ['cpVariants'=>$cpVariants]);
    }
    public function show(custom_product_variant $cpVariants)
    {
        return view('admin.customProductVariants.single' , ['cpVariants'=>$cpVariants]);
    }
    public function edit(custom_product_variant $cpVariants)
    {
        // dd($cpVariants);
        $customProducts  = custom_product::all();
        return view('admin.customProductVariants.edit' , ['cpVariants'=>$cpVariants , 'customProducts'=>$customProducts]);
    }
    public function update(Request $request)
    {
       $cpv = custom_product_variant::find($request->id);
       $cpv->title = $request->title;
       $cpv->description = $request->description;
       $cpv->custom_product_id = $request->custom_product_id;
       $cpv->min_amount_unit = $request->min_amount_unit;
       $cpv->duration = $request->duration;

       if(isset($request->image)){
            Storage::disk('public')->delete($cpv->image);
            $name = $request->image->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
            $cpv->image = $path;
        }

       $cpv->save();
       return to_route('cpv.list');
    }
    public function delete(custom_product_variant $cpVariants)
    {
        Storage::disk('public')->delete($cpVariants->image);
        $cpVariants->delete();
       return to_route('cpv.list');
    }
}
