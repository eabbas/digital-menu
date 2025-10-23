<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;

class ProductController extends Controller
{
    public function create()
    {
        $categories = category::all();
        return view("product.create" , ['categories'=>$categories]);
    }
    public function store(Request $request)
    {
        if($request->home){
            product::create([
                'title'=> $request->title, 
                'description' => $request->description,
                'price' => $request->price , 
                'discount' => $request->discount,
                'show_in_home' => $request->home,
                'cat_id' => $request->categoryId
            ]);
        }
        else{
            product::create([
                'title'=> $request->title, 
                'description' => $request->description,
                'price' => $request->price , 
                'discount' => $request->discount,
                'cat_id' => $request->categoryId
            ]);
        }
    }
    public function index()
    {
        $categories = category::all();
        $products = product::all();
        return view("product.index" , ['categories'=>$categories , 'products'=>$products]);
    }

    public function show(product $product)
    {
        $categories = category::all();
        return view("product.single" , ['product'=>$product , 'categories'=>$categories]);
    }
    public function edit(product $product)
    {
        $categories = category::all();
        return view('product.edit' , ['product'=>$product , 'categories'=>$categories]);
    }
    public function update(Request $request)
    {
        $product = product::find($request->id);
        // dd($request->all());
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->show_in_home = $request->homes;
        $product->cat_id = $request->categoryId;
        $product->save();
    }
    public function delete(product $product)
    {
        $product->delete();
    }
}
