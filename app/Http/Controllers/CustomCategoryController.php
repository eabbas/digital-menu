<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customCategory;

class CustomCategoryController extends Controller
{
       public function create()
    {
        return view('admin.customCategory.create');
    }
    public function store(Request $request)
    {
        customCategory::create([
            'title'=>$request->title ,
            'max_item_amount' => $request->max_item_amount 
        ]);
        return to_route('custmCategory.list');
    }
    public function index()
    {
        $customCategories = customCategory::all();
        return view('admin.customCategory.index' , ['customCategories'=>$customCategories]);
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
        $customCategory =  customCategory::find($request->id);
        $customCategory->title = $request->title;
        $customCategory->max_item_amount = $request->max_item_amount;
        $customCategory->save();

        return to_route('custmCategory.list');
    }
    public function delete(customCategory $customCategory)
    {
        $customCategory->delete();
        return to_route('custmCategory.list');

    }
}
