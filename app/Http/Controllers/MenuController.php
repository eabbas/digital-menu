<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\custom_product;
use App\Models\menu;
use App\Models\qr_code;
use App\Models\User;
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
        menu::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'banner' => $bannerPath,
            'career_id' => $request->career_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        return to_route('career.menus', [$request->career_id]);
    }

    public function single(menu $menu)
    {
        return view('admin.menu.single', ['menu' => $menu]);
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
        return to_route('menu.single', [$menu]);
    }

    public function delete(menu $menu)
    {
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

    public function showMenu(menu $menu)
    {
        return view('admin.menu.menu', ['menu' => $menu]);
    }

    public function createMenu()
    {
        return view('admin.menu.createMenu');
    }

    public function customProMenu(career $career)
    {
        return view('admin.menu.customProList', ['career' => $career]);
    }
}
