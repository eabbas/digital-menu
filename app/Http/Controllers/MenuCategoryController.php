<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\career;
use App\Models\menu_category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\menu;

class MenuCategoryController extends Controller
{
    public function create(menu $menu){
        return view('admin.menu.category.create', ['menu'=>$menu]);
    }

    public function store(Request $request){
        $menuCats = $request->menuCat;
        foreach($menuCats as $key => $menuCat){
            if (isset($menuCat['image'])) {
                $name = $menuCat['image']->getClientOriginalName();
                $fullName = Str::uuid().'_'.$name;
                $path = $menuCat['image']->storeAs('images', $fullName, 'public');
                $menuCats[$key]['image']=$path;
            }
            $menuCats[$key]['menu_id']=$request->menu_id;
        }
        menu_category::insert($menuCats);
        return to_route('menuCat.list', [$request->menu_id]);
    }

    public function index(menu $menu){
        return view('admin.menu.category.index', ['menu'=>$menu]);
    }

    public function edit(menu_category $menu_category){
        return view('admin.menu.category.edit', ['category'=>$menu_category]);
    }

    public function update(Request $request){
        $menu_cat = menu_category::find($request->id);
        $menu_cat->title = $request->title;
        $menu_cat->description = $request->description;
        $menu_cat->menu_id = $request->id;
        if(isset($request->image)){
            Storage::disk('public')->delete($menu_cat->image);
            $name = $request->image->getClientOriginalName();
            $fullName = Str::uuid().'_'.$name;
            $path = $request->file('image')->storeAs('image', $fullName, 'public');
            $menu_cat->image = $path;
        }
        $menu_cat->save();
        return to_route('menuCat.list', [$request->id]);
    }

    public function delete(menu_category $menu_category){
        dd($menu_category);
        $menu_id = $menu_category->menu->id;
        $menu_category->delete();
        return to_route('menuCat.list', [$menu_id]);
    }
    

    // public function menu(career $career){
    //     return view('admin.menu.menu', ['career'=>$career]);
    // }
}
