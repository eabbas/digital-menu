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
        $customCategory_id = customCategory::insertGetId([
            'title'=>$request->title ,
            'required' => $request->required ? $request->required : 0 , 
            'max_item_amount' => $request->max_item_amount ,
            'custom_pro_id' => $request->custom_pro_id 
        ]);
        $data = customCategory::find($customCategory_id);
        return response()->json($data);
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

    public function edit(Request $request)
    {
        $customCategory = customCategory::find($request->id);
        return response()->json($customCategory);
    }

    public function update(Request $request)
    {
        $customCategory = customCategory::find($request->id);
        $customCategory->title = $request->title;
        $customCategory->required = $request->required;
        $customCategory->max_item_amount = $request->max_item_amount;
        $customCategory->save();

        return response()->json($customCategory);

    }

    public function delete(request $request)
    {
        $category = customCategory::find($request->id);
        $category->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'دسته‌بندی با موفقیت حذف شد'
        ]);
    }

    public function item_list(customCategory $customCategory)
    {
        return view('admin.customCategory.item_list', ['customCategory' => $customCategory]);
    }
}
