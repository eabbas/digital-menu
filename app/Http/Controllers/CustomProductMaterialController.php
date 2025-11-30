<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\custom_product;
use App\Models\custom_product_material;
use App\Models\customCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CustomProductMaterialController extends Controller
{
    public function create()
    {
        $customProducts = custom_product::all();
        $customCategories = customCategory::all();
        return view('admin.customProductMaterials.create' , ['customProducts'=>$customProducts , 'customCategories'=>$customCategories]);
    }
    public function store(Request $request)
    {
        // dd($request->custom_category_id);
        $name = $request->image->getClientOriginalName();
        $fullName = time()."_".$name;
        $path = $request->file('image')->storeAs('images', $fullName, 'public');
        if($request->required){
            custom_product_material::create([
                'title' => $request->title , 
                'description' => $request->description ,
                'price_per_unit' => $request->price_per_unit ,
                'category_name' => $request->category_name , 
                'order' => $request->order , 
                'required' => $request->required , 
                'category_limit' => $request->category_limit , 
                'max_unit_amount' => $request->max_unit_amount , 
                'custom_product_id' => $request->custom_product_id ,
                'category_id' => $request->custom_category_id ,
                'image' => $path
            ]);
        }else{
            custom_product_material::create([
               'title' => $request->title , 
               'description' => $request->description ,
               'price_per_unit' => $request->price_per_unit ,
               'category_name' => $request->category_name , 
               'order' => $request->order , 
                'required' => 0 , 
               'category_limit' => $request->category_limit , 
               'max_unit_amount' => $request->max_unit_amount , 
               'custom_product_id' => $request->custom_product_id ,
               'category_id' => $request->custom_category_id ,
               'image' => $path
            ]);
        }
        return to_route('cpm.list');
    }
    public function index()
    {
        // $cpmWithCustomproduct = custom_product_material::with('custom_product')->get();
        $cpmWithCustomproduct = custom_product_material::with('customCategory')->get();
       return view('admin.customProductMaterials.index', ['cpmWithCustomproduct'=>$cpmWithCustomproduct]);
    }
    public function show(custom_product_material $cpm)
    {
        $cpmWithCustomproduct = custom_product_material::with('customCategory')->get();
        return view('admin.customProductMaterials.single' , ['cpm'=>$cpm , 'cpmWithCustomproduct'=>$cpmWithCustomproduct]);
    }
    public function edit(custom_product_material $cpm)
    {
        $customProducts  = custom_product::all();
        $customCategories = customCategory::all();
        return view('admin.customProductMaterials.edit' , ['cpm'=>$cpm , 'customProducts'=>$customProducts , 'customCategories'=>$customCategories]);
    }
    public function update(Request $request)
    {
        $name = $request->image->getClientOriginalName();
        $fullName = time()."_".$name;
        $path = $request->file('image')->storeAs('images', $fullName, 'public');

        $customProductMaterial =  custom_product_material::find($request->id);
        $customProductMaterial->title = $request->title;
        $customProductMaterial->description = $request->description;
        $customProductMaterial->price_per_unit = $request->price_per_unit;
        $customProductMaterial->required = $request->required;
        $customProductMaterial->order = $request->order;
        $customProductMaterial->max_unit_amount = $request->max_unit_amount;
        $customProductMaterial->custom_product_id = $request->custom_product_id;
        $customProductMaterial->category_id = $request->custom_category_id;
        Storage::disk('public')->delete($customProductMaterial->image);
        $customProductMaterial->image = $path;
        $customProductMaterial->save();

        return to_route('cpm.list');
    }
    public function delete(custom_product_material $cpm)
    {
        Storage::disk('public')->delete($cpm->image);
        $cpm->delete();
        return to_route('cpm.list');
    }
}
