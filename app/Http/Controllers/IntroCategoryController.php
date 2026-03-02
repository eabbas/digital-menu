<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\intro_category;
use App\Models\pages;
use Illuminate\Support\Facades\Auth;

class IntroCategoryController extends Controller
{
    public function store(Request $request){
        $cat_id = intro_category::insertGetId([
            'title'=>$request->title,
            'user_id'=>Auth::id(),
            'page_id'=>$request->page_id,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        $category = intro_category::find($cat_id);
        return response()->json($category);
    }

    public function selectCats(pages $pages){
        $categories = $pages->introCats;
        return response()->json($categories);
    }

    public function edit(Request $request){
        $category = intro_category::find($request->introCatId);
        return response()->json($category);
    }

    public function update(Request $request){
        $category = intro_category::find($request->category_id);
        $category->title = $request->title;
        $category->save();
        return response()->json($category);
    }
}
