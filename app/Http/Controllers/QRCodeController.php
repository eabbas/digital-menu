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
        return view('admin.menus.create');
    }

    public function delete(qr_code $qr_code){
        $count = $qr_code->menu->qr_num;
        $count-=1;
        $qr_code->menu->qr_num = $count;
        $qr_code->menu->save();
        Storage::disk('public')->delete($qr_code->qr_path);
        $qr_code->delete();
        return to_route('menu.edit', [$qr_code->menu]);
    }

    public function load(career $career, string $slug){
        return to_route('client.menu', [$career, $slug]);
    }
}
