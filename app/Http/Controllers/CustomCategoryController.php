<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\career;
use App\Models\custom_product;
use App\Models\custom_product_variant;
use App\Models\customCategory;
use Illuminate\Http\Request;

class CustomCategoryController extends Controller
{
    public function create(custom_product $custom_product)
    {
        return view('admin.customCategory.create', ['custom_product' => $custom_product]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $customCategory_id = customCategory::insertGetId([
        //     'title'=>$request->titleCategory ,
        //     'required' => $request->required ? $request->required : 0 , 
        //     'max_item_amount' => $request->max_item_amount ,
        //     'custom_pro_id' => $request->custom_pro_id 
        // ]);
        // $data = customCategory::find($customCategory_id);
        return response()->json($request->all());
        // return to_route('custmCategory.list' , [$request->custom_pro_id]);
    }

    public function index(career $career, custom_product $customProduct)
    {
        return view('admin.customCategory.index', ['career' => $career, 'customProduct' => $customProduct]);
    }

    public function show(customCategory $customCategory)
    {
        return view('admin.customCategory.single', ['customCategory' => $customCategory]);
    }

    public function edit(customCategory $customCategory)
    {
        return view('admin.customCategory.edit', ['customCategory' => $customCategory]);
    }

    public function update(Request $request)
    {
        $customCategory = customCategory::find($request->id);
        $customCategory->title = $request->title;
        $customCategory->required = $request->required;
        $customCategory->max_item_amount = $request->max_item_amount;
        $customCategory->save();
        return to_route('custmCategory.list', [$request->custom_pro_id]);
    }

    public function delete(customCategory $customCategory)
    {
        $customCategory->delete();
        return to_route('custmCategory.list', [$customCategory->custom_products->id]);
    }

    public function item_list(customCategory $customCategory)
    {
        return view('admin.customCategory.item_list', ['customCategory' => $customCategory]);
    }
}
