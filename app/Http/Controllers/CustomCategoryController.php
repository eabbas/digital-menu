<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\custom_product_variant;
use Illuminate\Http\Request;
use App\Models\customCategory;
use App\Models\career;
use App\Models\custom_product;

class CustomCategoryController extends Controller
{
    public function create(custom_product $customProduct , career $career)
    {
        return view('admin.customCategory.create' , ['customProduct'=>$customProduct , 'career'=>$career]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        customCategory::create([
            'title'=>$request->title ,
            'required' => $request->required , 
            'max_item_amount' => $request->max_item_amount ,
            'custom_pro_id' => $request->custom_pro_id 
        ]);
        return to_route('custmCategory.list' , [$request->custom_pro_id]);
    }
    public function index(career $career , custom_product $customProduct)
    {
        // dd($customProduct->customCategories);
        return view('admin.customCategory.index' , ['career'=>$career ,'customProduct'=>$customProduct]);
    }
    public function show(customCategory $customCategory)
    {
        return view('admin.customCategory.single' , ['customCategory'=>$customCategory]);
    }
    public function edit(customCategory $customCategory)
    {
        return view('admin.customCategory.edit' , ['customCategory'=>$customCategory]);
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $customCategory =  customCategory::find($request->id);
        $customCategory->title = $request->title;
        $customCategory->required = $request->required;
        $customCategory->max_item_amount = $request->max_item_amount;
        $customCategory->save();
        return to_route('custmCategory.list' , [$request->custom_pro_id]);
    }
    public function delete(customCategory $customCategory)
    {
        $customCategory->delete();
        return to_route('custmCategory.list' , [$customCategory->custom_products->id]);
    }
}
