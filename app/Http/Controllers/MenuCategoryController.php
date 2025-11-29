<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\career;
use App\Models\menu_category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenuCategoryController extends Controller
{
    public function create(career $career){
        return view('admin.menu.category.create', ['career'=>$career]);
    }

    public function store(Request $request){
        $menuCats = $request->menuCat;
        foreach($menuCats as $key => $menuCat){
            $name = $menuCat['image']->getClientOriginalName();
            $fullName = Str::uuid().'_'.$name;
            $path = $menuCat['image']->storeAs('images', $fullName, 'public');
            $menuCats[$key]['image']=$path;
            $menuCats[$key]['career_id']=$request->career_id;
        }
        menu_category::insert($menuCats);
        return to_route('menuCat.list', [$request->career_id]);
    }

    public function index(){
        $categories = menu_category::all();
        return view('admin.menu.category.index', ['categories'=>$categories]);
    }

    public function edit(menu_category $menu_category){
        return view('admin.menu.category.edit', ['category'=>$menu_category]);
    }

    public function update(Request $request){
        $menu_cat = menu_category::find($request->id);
        $menu_cat->title = $request->title;
        $menu_cat->description = $request->description;
        if(isset($request->image)){
            Storage::disk('public')->delete($menu_cat->image);
            $name = $request->image->getClientOriginalName();
            $fullName = Str::uuid().'_'.$name;
            $path = $request->file('image')->storeAs('image', $fullName, 'public');
            $menu_cat->image = $path;
        }
        $menu_cat->save();
        return to_route('menuCat.list', [$request->career_id]);
    }

    public function delete(menu_category $menu_category){
        $career_id = $menu_category->career->id;
        $menu_category->delete();
        return to_route('menuCat.list', [$career_id]);
    }

    public function menu(career $career){
        return view('admin.menu.menu', ['career'=>$career]);
    }
}
