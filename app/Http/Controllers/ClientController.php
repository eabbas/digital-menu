<?php

namespace App\Http\Controllers;

use App\Models\career;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function show_menu(career $career, string $slug = null)
    {
        return view('client.menu', ['career' => $career, 'slug' => $slug]);
    }

    public function career_menu(career $career)
    {
        return view('client.menu', ['career' => $career]);
    }

    public function show_career(career $career)
    {
        return view('client.career.single', ['career' => $career]);
    }
}
