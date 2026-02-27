<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\intro_category;

class IntroCategoryController extends Controller
{
    public function store(Request $request){
        return response()->json($request->all());
    }
}
