<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\career;

class ClientController extends Controller
{
    public function show_menu(career $career, string $slug){
        return view('client.menu', ['career'=>$career]);
    }

    public function career_menu(career $career){
        return view('client.menu', ['career'=>$career]);
    }

    public function show_career(career $career){
        return view('client.career.single', ['career'=>$career]);
    }
}
