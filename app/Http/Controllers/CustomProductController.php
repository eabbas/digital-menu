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
            'duration' => $request->duration ,
            'material_limit' => $request->material_limit ,
            'min_amount_unit' => $request->min_amount_unit ,
            'image'=>$path
        ]);
        return to_route('cp.list');
    }
    public function index()
    {
        $allCustomProduct = custom_product::all();
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
        $name = $request->customProductImage->getClientOriginalName();
        $fullName = time()."_".$name;
        $path = $request->file('customProductImage')->storeAs('images', $fullName, 'public');

        $customProduct =  custom_product::find($request->id);
        $customProduct->title = $request->title;
        $customProduct->description = $request->description;
        $customProduct->duration = $request->duration;
        $customProduct->material_limit = $request->material_limit;
        $customProduct->min_amount_unit = $request->min_amount_unit;
        Storage::disk('public')->delete($customProduct->image);
        $customProduct->image = $path;
        $customProduct->save();

        return to_route('cp.list');
    }
    public function delete(custom_product $customProduct)
    {
        $customProduct->delete();
        Storage::disk('public')->delete($customProduct->image);

        return to_route('cp.list');

    }
}
