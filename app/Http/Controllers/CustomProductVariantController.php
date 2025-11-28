<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\custom_product_variant;
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
        custom_product_variant::create([
            'title'=>$request->title ,
            'description' => $request->description ,
            'custom_product_id' => $request->custom_product_id ,
            'min_amount_unit' => $request->min_amount_unit ,
        ]);
        return to_route('cpv.list');
    }
    public function index()
    {
       $cpVariants = custom_product_variant::with('custom_product')->get();
    
       return view('admin.customProductVariants.index', ['cpVariants'=>$cpVariants]);
    }
    public function show(custom_product_variant $cpVariants)
    {
        return view('admin.customProductVariants.single' , ['cpVariants'=>$cpVariants]);
    }
    public function edit(custom_product_variant $cpVariants)
    {
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
       $cpv->save();
       return to_route('cpv.list');
    }
    public function delete(custom_product_variant $cpVariants)
    {
        $cpVariants->delete();
       return to_route('cpv.list');
    }
}
