<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qr_code;
use App\Models\menu;
use Illuminate\Support\Facades\Storage;
use App\Models\career;

class QrCodeController extends Controller
{
    public function create(){
        return view('menus.create');
    }

    public function delete(qr_code $qr_code){
        $menu = menu::find($qr_code->menu_id);
        Storage::disk('public')->delete($qr_code->qr_path);
        $qr_code->delete();
        return to_route('user.career.menu.edit', [$menu]);
    }

    public function load(career $career, string $slug){
        return to_route('client.menu', [$career, $slug]);
    }
}
