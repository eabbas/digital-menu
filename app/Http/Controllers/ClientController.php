<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\career;

class ClientController extends Controller
{
    public function show_menu(career $career, string $slug){
        // dd($career);
        return view('client.menu', ['career'=>$career]);
    }
}
