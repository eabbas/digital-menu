<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\intro_category;
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

    public function selectCats(){
        $categories = Auth::user()->introCats;
        return response()->json($categories);
    }
}
