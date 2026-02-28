<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\intro_product;
use App\Models\intro_pro_cat;
use App\Models\intro_product_attribute;
use App\Models\intro_product_gallery;

class IntroProductController extends Controller
{
    public function store(Request $request){
       
        $name = $request->main_image->getClientOriginalName();
        $fullName = time()."_".$name;
        $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
        $pro_id = intro_product::insertGetId([
            'title'=>$request->title,
            'description'=>isset($request->description) ? $request->description : null,
            'main_image'=>$path,
            'attributes'=>json_encode($request->input("attributes"))
        ]);
        $categories = explode(',',$request->categpries);
        foreach($categories as $category){
            intro_pro_cat::create([
                'intro_category_id'=>$category,
                'intro_product_id'=>$pro_id
            ]);
        }
        $gallery = [];
        foreach($request->gallery as $item){
            $gallery[]=$item;
            $galleryName = $item->getClientOriginalName();
            $fullGalleryName = time()."_".$galleryName;
            $galleryPath = $item->storeAs('images', $fullGalleryName, 'public');
            intro_product_gallery::create([
                'image'=>$galleryPath,
                'intro_product_id'=>$pro_id
            ]);
        }
        return response()->json($request->all());
    }
}
