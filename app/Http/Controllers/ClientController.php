<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\covers;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function show_menu(career $career, string $slug = null)
    {
        // set qr count in qrcode controller load method
        return view('client.menu', ['career' => $career, 'slug' => $slug]);
    }

    public function loadLink(covers $covers, string $slug = null){
        $user = $covers->user;
        $user->scan_count += 1;
        $user->save();
        return view('client.link.single', ['cover'=>$covers, 'slug'=>$slug]);
    }

    public function show_career(career $career)
    {
        return view('client.career.single', ['career' => $career]);
    }
}
