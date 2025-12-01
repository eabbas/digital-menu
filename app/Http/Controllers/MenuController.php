<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\menu;
use App\Models\qr_code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use function Symfony\Component\Clock\now;

class MenuController extends Controller
{
    public function create(career $career)
    {
        return view('admin.menu.create', ['career' => $career]);
    }

    public function store(Request $request)
    {
        $bannerPath = null;
        if (isset($request->banner)) {
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = time() . '_' . $bannerName;
            $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
        }
        $menu_id = menu::insertGetId([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'banner' => $bannerPath,
            'qr_num' => $request->qrcode_count,
            'career_id' => $request->career_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        for ($i = 0; $i < $request->qrcode_count; $i++) {
            $random = Str::random(10);
            $link = "famenu.ir/qrcode/$menu_id/" . $random;
            $qr_svg = QrCode::size(100)->generate($link);
            $fileName = 'qrcodes/' . $menu_id . '_' . $random . '.svg';
            Storage::disk('public')->put($fileName, $qr_svg);
            qr_code::create([
                'qr_path' => $fileName,
                'career_id' => $request->career_id,
                'menu_id' => $menu_id,
                'slug' => 'qrcode/' . $menu_id . '/' . $random
            ]);
        }
        return to_route('menu.single', [$menu_id]);
    }

    public function single(menu $menu)
    {
        return view('admin.menu.single', ['menu' => $menu]);
    }

    public function qrcodes(menu $menu)
    {
        return view('admin.menu.qrcodes', ['menu' => $menu]);
    }

    public function edit(menu $menu)
    {
        return view('admin.menu.edit', ['menu' => $menu]);
    }

    public function update(Request $request)
    {
        $menu = menu::find($request->id);
        $menu->title = $request->title;
        $menu->subtitle = $request->subtitle;
        $menu->career_id = $request->career_id;
        if (isset($request->banner)) {
            if ($menu->banner) {
                Storage::disk('public')->delete($menu->banner);
            }
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = Str::uuid() . '_' . $bannerName;
            $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
            $menu->banner = $bannerPath;
        }
        if ($request->qrcode_count) {
            if ((int) $request->qrcode_count > $menu->qr_num) {
                $qr_num = (int) $request->qrcode_count - $menu->qr_num;
                while ($qr_num) {
                    $random = Str::random(10);
                    $link = "famenu.ir/qrcodes/$menu->id/" . $random;
                    $qr_svg = QrCode::size(100)->generate($link);
                    $fileName = 'qrcodes/' . $menu->id . '_' . $random . '.svg';
                    Storage::disk('public')->put($fileName, $qr_svg);
                    qr_code::create([
                        'qr_path' => $fileName,
                        'career_id' => $request->career_id,
                        'menu_id' => $menu->id,
                        'slug' => 'qrcode/' . $menu->id . '/' . $random
                    ]);
                    $qr_num--;
                }
            }
            // if ($request->qr_num<=$menu->qr_num) {
            //     # code...
            // }
        }
        $menu->qr_num = $request->qrcode_count;
        $menu->save();
        return to_route('menu.single', [$menu]);
    }

    public function delete(menu $menu)
    {
        foreach ($menu->qr_codes as $qr_code) {
            $qr_code->delete();
        }
        if (count($menu->menu_categories)) {
            foreach ($menu->menu_categories as $category) {
                if (count($category->menu_items)) {
                    foreach ($category->menu_items as $item) {
                        if (count($item->ingredients)) {
                            foreach ($item->ingredients as $ingredients) {
                                $ingredients->delete();
                            }
                        }
                        $item->delete();
                    }
                }
                $category->delete();
            }
        }
        $menu->delete();
        if (Auth::user()->role[0]->title == 'admin') {
            return to_route('career.careers');
        }
        return to_route('career.careers', [Auth::user()]);
    }

    public function showMenu(menu $menu){
        return view('admin.menu.menu', ['menu'=>$menu]);
    }
}
