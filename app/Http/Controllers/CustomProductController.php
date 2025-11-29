<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\custom_product;
use Illuminate\Support\Facades\Storage;

class CustomProductController extends Controller
{
    public function create()
    {
        return view('admin.customProducts.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // $type = $request->customProductImage->getClientOriginalExtension();
        $name = $request->customProductImage->getClientOriginalName();
        $fullName = time()."_".$name;
        $path = $request->file('customProductImage')->storeAs('images', $fullName, 'public');
        // dd($path);
        custom_product::create([
            'title'=>$request->title ,
            'description' => $request->description ,
            'material_limit' => $request->material_limit ,
            'image'=>$path
        ]);
        return to_route('cp.list');
    }
    public function index()
    {
        $allCustomProduct = custom_product::all();
        // $allCustomProduct = custom_product::with('custom_product_materials')->get();
        // return $allCustomProduct;
        return view('admin.customProducts.index' , ['allCustomProduct'=>$allCustomProduct]);
    }
    public function show(custom_product $customProduct)
    {
        return view('admin.customProducts.single' , ['customProduct'=>$customProduct]);
    }
    public function edit(custom_product $customProduct)
    {
        return view('admin.customProducts.edit' , ['customProduct'=>$customProduct]);
    }
    public function update(Request $request)
    {
        $customProduct =  custom_product::find($request->id);
        $customProduct->title = $request->title;
        $customProduct->description = $request->description;
        $customProduct->material_limit = $request->material_limit;
        if(isset($request->customProductImage)){
            Storage::disk('public')->delete($customProduct->image);
            $name = $request->customProductImage->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->file('customProductImage')->storeAs('images', $fullName, 'public');
            $customProduct->image = $path;
        }
        $customProduct->save();

        return to_route('cp.list');
    }
    public function delete(custom_product $customProduct)
    {
        $customProductWithVariants = custom_Product::with('custom_product_variants')->get();
        $customProductWithMaterials = custom_Product::with('custom_product_materials')->get();
        foreach($customProductWithVariants as $variants){
            $variants->delete();
        }
        foreach($customProductWithMaterials as $materials){
            $materials->delete();
        }
        Storage::disk('public')->delete($customProduct->image);
        $customProduct->delete();

        return to_route('cp.list');

    }
}
