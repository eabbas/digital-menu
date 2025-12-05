<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\custom_product;
use App\Models\career;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CustomProductController extends Controller
{
    public function create(career $career)
    {
        // dd($career->id);
        return view('admin.customProducts.create' , ['career'=>$career]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $path = null;
        if(isset($request->customProductImage)){

            $name = $request->customProductImage->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->file('customProductImage')->storeAs('images', $fullName, 'public');

        }
        // dd($path);
        custom_product::create([
            'title'=>$request->title ,
            'description' => $request->description ,
            'career_id' => $request->career_id ,
            'material_limit' => $request->material_limit ,
            'image'=>$path
        ]);
        return to_route('menu.customProList');
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
        // dd($request->all());
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

        return to_route('menu.customProList', [$request->career_id]);
    }
    public function delete(custom_product $customProduct)
    {
        // $customProduct->custom_product_variants;
        // $customProduct->custom_product_materials;
        // return $customProduct;
        if(count($customProduct->custom_product_variants)){
            foreach($customProduct->custom_product_variants as $variants){
                $variants->delete();
            }
        }
        if(count($customProduct->custom_product_materials)){
            foreach($customProduct->custom_product_materials as $materials){
                $materials->delete();
            }
        }
        if($customProduct->image){
            Storage::disk('public')->delete($customProduct->image);
        }
        $customProduct->delete();
        // return to_route('cp.list');
    }
    public function createFromDashboard(User $user)
    {
        return view('admin.customProducts.createFromDashboard' , ['user'=>$user]);
    }
}
