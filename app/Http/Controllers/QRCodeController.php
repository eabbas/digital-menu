<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qr_code;
use App\Models\menu;
use Illuminate\Support\Facades\Storage;
use App\Models\career;
use App\Models\covers;

class QrCodeController extends Controller
{
    // public function create(){
    //     return view('admin.menus.create');
    // }

    public function delete(Request $request){
        $qr_code = qr_code::find($request->id);
        $count = $qr_code->career->qr_count;
        $count-=1;
        $qr_code->career->qr_count = $count;
        $qr_code->career->save();
        Storage::disk('public')->delete($qr_code->qr_path);
        $qr_code->delete();
        return response()->json('ok');
        return response()->json($qr_code);
        // return to_route('career.edit', [$qr_code->career]);
    }

    public function load(career $career, string $slug){
        return to_route('client.menu', [$career, $slug]);
    }
    public function loadLink(covers $covers, string $slug){
        return view('client.link.single', ['cover'=>$covers, 'slug'=>$slug]);
    }
    public function edit(Request $request){
        $qrcode = qr_code::find($request->id);
        return response()->json($qrcode);
    }
    public function update(Request $request){
        $qr_code = qr_code::find($request->id);
        $qr_code->description = $request->description;
        $qr_code->save();
        return response()->json($qr_code);
    }
}
