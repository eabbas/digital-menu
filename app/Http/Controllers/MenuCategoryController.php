<?php

namespace App\Http\Controllers;

use App\Models\career;
use App\Models\menu;
use App\Models\menu_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenuCategoryController extends Controller
{
    public function create(menu $menu)
    {
        return view('admin.menu.category.create', ['menu' => $menu]);
    }

    public function store(Request $request)
    {
        $menuCats = $request->menuCat;
        foreach ($menuCats as $key => $menuCat) {
            if (isset($menuCat['image'])) {
                $name = $menuCat['image']->getClientOriginalName();
                $fullName = Str::uuid() . '_' . $name;
                $path = $menuCat['image']->storeAs('images', $fullName, 'public');
                $menuCats[$key]['image'] = $path;
            }
            $menuCats[$key]['menu_id'] = $request->menu_id;
        }
        menu_category::insert($menuCats);
        return to_route('menuCat.list', [$request->menu_id]);
    }

    public function index(menu $menu)
    {
        return view('admin.menu.category.index', ['menu' => $menu]);
    }

    public function edit(menu_category $menu_category)
    {
        return view('admin.menu.category.edit', ['category' => $menu_category]);
    }

    public function update(Request $request)
    {
        $menu_cat = menu_category::find($request->id);
        $menu_cat->title = $request->title;
        $menu_cat->description = $request->description;
        $menu_cat->menu_id = $request->menu_id;
        if (isset($request->image)) {
            if ($menu_cat->image) {
                Storage::disk('public')->delete($menu_cat->image);
            }
            $name = $request->image->getClientOriginalName();
            $fullName = Str::uuid() . '_' . $name;
            $path = $request->file('image')->storeAs('image', $fullName, 'public');
            $menu_cat->image = $path;
        }
        $menu_cat->save();
        return to_route('menuCat.list', [$request->menu_id]);
    }

    public function delete(menu_category $menu_category)
    {
        $menu_id = $menu_category->menu->id;
        if (count($menu_category->menu_items)) {
            foreach ($menu_category->menu_items as $menu_item) {
                if (count($menu_item->ingredients)) {
                    foreach ($menu_item->ingredients as $ingredient) {
                        $ingredient->delete();
                    }
                }
                if (count($menu_item->menu_custom_ingredients)) {
                    foreach ($menu_item->menu_custom_ingredients as $menu_custom_ingredient) {
                        $menu_custom_ingredient->delete();
                    }
                }
                $menu_item->delete();
            }
        }
        $menu_category->delete();
        return to_route('menuCat.list', [$menu_id]);
    }
    public function deleteAll(Request $request)
    {
        if (!isset($request->menuCats)) {
            return redirect()->back();
        }
        foreach($request->menuCats as $menuCat_id){
            $menu_category = menu_category::find($menuCat_id);
            $menu_id = $menu_category->menu->id;
            if (count($menu_category->menu_items)) {
                foreach ($menu_category->menu_items as $menu_item) {
                    if (count($menu_item->ingredients)) {
                        foreach ($menu_item->ingredients as $ingredient) {
                            $ingredient->delete();
                        }
                    }
                    if (count($menu_item->menu_custom_ingredients)) {
                        foreach ($menu_item->menu_custom_ingredients as $menu_custom_ingredient) {
                            $menu_custom_ingredient->delete();
                        }
                    }
                    $menu_item->delete();
                }
            }
            $menu_category->delete();
        }
        return redirect()->back();
    }

    // public function menu(career $career){
    //     return view('admin.menu.menu', ['career'=>$career]);
    // }
}
