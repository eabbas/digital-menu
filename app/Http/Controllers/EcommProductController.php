<?php

namespace App\Http\Controllers;

use App\Models\ecomm;
use App\Models\ecomm_category;
use App\Models\ecomm_product;
use App\Models\ecomm_product_ecomm_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EcommProductController extends Controller
{
    public function create()
    {
        return view('admin.ecomm_products.create', ['user' =>Auth::user()]);
    }

    public function store(Request $request)
    {
        $path = null;
        if (isset($request->image_path)) {
            $name = $request->image_path->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->image_path->storeAs('files', $fullName, 'public');
        }
        if ($request->show_in_home) {
            $ecomm_product_id = ecomm_product::insertGetId(['title' => $request->title, 'description' => $request->description, 'show_in_home' => $request->show_in_home, 'image_path' => $path, 'ecomm_id' => $request->ecomm_id, 'price' => $request->price, 'discount' => $request->discount]);
        } else {
            $ecomm_product_id = ecomm_product::insertGetId(['title' => $request->title, 'description' => $request->description, 'show_in_home' => 0, 'image_path' => $path, 'ecomm_id' => $request->ecomm_id, 'price' => $request->price, 'discount' => $request->discount]);
        }
        ecomm_product_ecomm_category::create(['ecomm_product_id' => $ecomm_product_id, 'ecomm_category_id' => $request->ecomm_category_id]);
        $ecomm_products = ecomm_product::all();
        return to_route('ecomm_product.index', ['ecomm_products' => $ecomm_products]);
    }

    public function index()
    {
        return view('admin.ecomm_products.index', ['user' => Auth::user()]);
    }

    public function show(ecomm_product $ecomm_product)
    {
        return view('admin.ecomm_products.show', ['ecomm_product' => $ecomm_product]);
    }

    public function edit(ecomm_product $ecomm_product)
    {
        $ecomm = $ecomm_product->ecomm;
        $ecomm_categories = $ecomm->ecomm_category;
        return view('admin.ecomm_products.edit', ['ecomm_categories' => $ecomm_categories, 'ecomm_product' => $ecomm_product, 'user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $ecomm_product = ecomm_product::find($request->id);
        if (isset($request->image_path)) {
            if ($ecomm_product->image_path) {
                storage::disk('public')->delete($ecomm_product->image_path);
            }
            $name = $request->image_path->getClientOriginalName();
            $path = $request->image_path->storeAs('files', $name, 'public');
            $ecomm_product->image_path = $path;
        }

        $ecomm_product->title = $request->title;
        $ecomm_product->description = $request->description;
        $ecomm_product->price = $request->price;
        $ecomm_product->discount = $request->discount;
        $ecomm_product->ecomm_id = $request->ecomm_id;
        $ecomm_product->discount = $request->discount;
        if ($request->show_in_home) {
            $ecomm_product->show_in_home = 1;
        } else {
            $ecomm_product->show_in_home = 0;
        }
        $ecomm_product->save();
        $ecomm_product_ecomm_category = ecomm_product_ecomm_category::where('ecomm_product_id', $ecomm_product->id)->first();
        $ecomm_product_ecomm_category->ecomm_category_id = $request->ecomm_category_id;
        $ecomm_product_ecomm_category->save();
        $ecomm_products = ecomm_product::all();
        // return view("admin.ecomm_products.index",['ecomm_products'=>$ecomm_products]);
        // return to_route('ecomm_product.index');
        return back();
    }

    public function delete(ecomm_product $ecomm_product)
    {
        $product_categories = ecomm_product_ecomm_category::where('ecomm_product_id', $ecomm_product->id)->get();
        foreach ($product_categories as $product_category) {
            $product_category->delete();
        }
        $ecomm_product->delete();
        // $ecomm_products = ecomm_product::all();
        // return view('admin.ecomm_products.index', ['ecomm_products' => $ecomm_products]);
        return back();
    }

    public function category_product(ecomm_category $ecomm_category)
    {
        return view('admin.ecomm_products.category_product', ['ecomm_category' => $ecomm_category]);
    }
    public function menu_ecomm_category_product(Request $request){
        $ecomm_category=ecomm_category::find($request->key);
                return response()->json($ecomm_category->ecomm_products);
    }
}
