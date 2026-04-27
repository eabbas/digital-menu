<?php

namespace App\Http\Controllers;

use App\Models\intro_category;
use Illuminate\Http\Request;
use App\Models\intro_product;
use App\Models\intro_pro_cat;
use App\Models\intro_product_attribute;
use App\Models\intro_product_gallery;
use App\Models\User;
use App\Models\pages;
use Illuminate\Support\Facades\Auth;
use Log;

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
            'attributes'=>json_encode($request->input("attributes")),
            'user_id'=>Auth::id(),
            'page_id'=>$request->page_id,
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
        $product = intro_product::find($pro_id);
        return response()->json($product);
    }

    public function showProducts(Request $request){
        $introCategory = intro_category::find($request->input('category_id'));
        $introProducts=$introCategory->products;
        return response()->json($introProducts);
    }

    public function edit(Request $request){
        $product = intro_product::find($request->product_id);
        $product['categories']=$product->categories;
        $product['attributes']=json_decode($product->attributes);
        return response()->json($product);
    }

    public function update(Request $request){
        $product = intro_product::find($request->input('intro_product_id'));
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->attributes = json_encode($request->input('attributes'));
        if ($request->main_image != "undefined") {
            $name = $request->main_image->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
            $product->main_image = $path;
        }
        if (isset($request->gallery)) {
            $gallery = [];
            foreach($request->gallery as $item){
                $gallery[]=$item;
                $galleryName = $item->getClientOriginalName();
                $fullGalleryName = time()."_".$galleryName;
                $galleryPath = $item->storeAs('images', $fullGalleryName, 'public');
                intro_product_gallery::create([
                    'image'=>$galleryPath,
                    'intro_product_id'=>$request->input('intro_product_id')
                ]);
            }
        }
        intro_pro_cat::where('intro_product_id', $request->intro_product_id)->delete();
        foreach($request->categpries as $category){
            intro_pro_cat::create([
                'intro_category_id'=>$category,
                'intro_product_id'=>$request->input('intro_product_id')
            ]);
        }
        $product->updated_at = now();
        $product->save();
        $product['attributes']=json_decode($product->attributes);
        return response()->json($product);
    }

    public function delete(Request $request){
        $product = intro_product::find($request->product_id);
        if (count($product->gallery)) {
            foreach($product->gallery as $img){
                $img->delete();
            }
        }
        $product->delete();
        return response()->json('deleted');
    }

    public function single(intro_product $intro_product){
        return view('admin.pages.product.single', ['product'=>$intro_product]);
    }
    public function showForUser(intro_product $intro_product){
        return view('client.link.product.single', ['product'=>$intro_product]);
    }

    public function editSingle(Request $request){
        $page = pages::find($request->page_id);
        $product = intro_product::find($request->product_id);
        $product['categories']=$product->categories;
        $product['attributes']=json_decode($product->attributes);
        return response()->json(['categories'=>$page->introCats, 'product'=>$product]);
    }
}
