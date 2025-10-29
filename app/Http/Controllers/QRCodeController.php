<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
public function create(){
    return view('menus.create');
}
    public function store(Request $request){
       
        
    }
}
