<?php

namespace App\Http\Controllers;

use App\Models\ingredients;
use Illuminate\Http\Request;
use App\Models\menu_item;
use App\Models\menu_category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller
{
    public function create(menu_category $menu_category){
        return view('admin.menu.item.create', ['category'=>$menu_category]);
    }

    public function store(Request $request){
        $path = null;
        if (isset($request->image)) {
            $name = $request->image->getClientOriginalName();
            $fullName = time().'_'.$name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
        }
        $parent_id = 0;
        $customizable = 0;
        $discount = 0;
        $imagePath = null;
        if (isset($request->parent_id)) {
            $parent_id = $request->parent_id;
        }
        if (isset($request->customizable)) {
            $customizable = $request->customizable;
        }
        if (isset($request->discount)) {
            $discount = $request->discount;
        }
        $menu_id = menu_item::insertGetId([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'discount'=>$discount,
            'customizable'=>$customizable,
            'image'=>$path,
            'parent_id'=>$parent_id,
            'menu_category_id'=>$request->menu_categories_id,
            'duration'=>$request->duration
        ]);

        if(isset($request->ingredients)){
            foreach($request->ingredients as $ingre){
               
                if(isset($ingre['image'])){
                    $ingreImage = $ingre['image']->getClientOriginalName();
                    $fullIngreImageName = Str::uuid().'_'.$ingreImage;
                    $imagePath = $ingre['image']->storeAs('images', $fullIngreImageName, 'public');
                }
                ingredients::create([
                    'title'=>$ingre['title'],
                    'description'=>$ingre['description'],
                    'image'=>$imagePath,
                    'price_per_unit'=>$ingre['price_per_unit'],
                    'max_unit_amount'=>$ingre['max_unit_amount'],
                    'menu_item_id'=>$menu_id
                ]);
            }
        }
        return to_route('menuItem.items', [$request->menu_categories_id]);
    }

    public function items(menu_category $menu_category){
        return view('admin.menu.item.catItems', ['category'=>$menu_category]);
    }

    public function variants(menu_item $menu_item){
        return view('admin.menu.item.addVariants', ['item'=>$menu_item]);
    }

    public function edit(menu_item $menu_item){
        
        return view('admin.menu.item.edit', ['menu'=>$menu_item]);
    }

    public function update(Request $request){
        $item = menu_item::find($request->id);
        $item->title = $request->title;
        $item->description = $request->description;
        $item->customizable = $request->customizable ? $request->customizable : 0;
        $item->price = $request->price;
        $item->duration = $request->duration;
        $imagePath = null;
        if (isset($request->discount)) {
            $item->discount = $request->discount;
        }
        if (isset($request->image)) {
            $item->image && Storage::disk('public')->delete($item->image);
            $name = $request->image->getClientOriginalName();
            $fullName = time().'_'.$name;
            $path = $request->file('image')->storeAs('images', $fullName, 'public');
            $item->image = $path;
        }
        if (isset($request->ingredients)) {
            foreach($item->ingredients as $ingredients){
                $ingredients->image && Storage::disk('public')->delete($ingredients->image);
                $ingredients->delete();
            }
            foreach($request->ingredients as $ingre){
                if(isset($ingre['image'])){
                    $ingreImage = $ingre['image']->getClientOriginalName();
                    $fullIngreImageName = Str::uuid().'_'.$ingreImage;
                    $imagePath = $ingre['image']->storeAs('images', $fullIngreImageName, 'public');
                }
                ingredients::create([
                    'title'=>$ingre['title'],
                    'description'=>$ingre['description'],
                    'image'=>$imagePath,
                    'price_per_unit'=>$ingre['price_per_unit'],
                    'max_unit_amount'=>$ingre['max_unit_amount'],
                    'menu_item_id'=>$request->id
                ]);
            }
        }
        $item->save();
        return to_route('menuItem.single', [$item->id]);
    }

    public function single(menu_item $menu_item){
        return view('admin.menu.item.single', ['item'=>$menu_item]);
    }

    public function delete(menu_item $menu_item){
        $id = $menu_item->menu_category->id;
        if (count($menu_item->ingredients)) {
            foreach($menu_item->ingredients as $ingredient){
                $ingredient->delete();
            }
        }
        if (count($menu_item->menu_custom_ingredients)) {
            foreach($menu_item->menu_custom_ingredients as $menu_custom_ingredient){
                $menu_custom_ingredient->delete();
                
            }
        }
        $menu_item->delete();
        return to_route('menuItem.items', [$id]);
    }
}
