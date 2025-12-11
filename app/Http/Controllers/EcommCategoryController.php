<?php

namespace App\Http\Controllers;

use App\Models\ecomm;
use App\Models\ecomm_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EcommCategoryController extends Controller
{
       public function create(){
        $user= Auth::user();    
        // $ecomm_categories=ecomm_category::where("ecomm_id",$user->ecomms[0]->id)->get();
       
        return view("admin.ecomm_categories.create",["user"=>Auth::user()]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $name = $request->image_path->getClientOriginalName();
        $type = $request->image_path->getClientOriginalExtension();
        $path = $request->image_path->storeAs('files', $name, 'public');
        if ($request->show_in_home) {
            ecomm_category::create(['title' => $request->title, 'description' => $request->description, 'parent_id' => $request->parent_id, 'show_in_home' => $request->show_in_home, 'image_path' => $path, 'ecomm_id' => $request->ecomm_id, 'user_id' => $user->id]);
        } else {
            ecomm_category::create(['title' => $request->title, 'description' => $request->description, 'parent_id' => $request->parent_id, 'show_in_home' => 0, 'image_path' => $path, 'ecomm_id' => $request->ecomm_id, 'user_id' => $user->id]);
        }
          $ecomm_categories=ecomm_category::with('parent')->get();
        
         return to_route("ecomm_category.index",['ecomm_categories'=>$ecomm_categories]);
    }

    // public function index(){
    //     $ecomm_categories = ecomm_category::with('parent')->get();
    //     return to_route('ecomm_category.index', ['ecomm_categories' => $ecomm_categories]);
    // }

    public function index()
    {
        $ecomm_categories = ecomm_category::with('parent')->get();
        $user = Auth::user();
        return view('admin.ecomm_categories.index', ['user' => $user]);
    }

    public function show(ecomm_category $ecomm_category)
    {
        $ecomm_category->parent;
        return view('admin.ecomm_categories.show', ['ecomm_category' => $ecomm_category]);
    }

    public function edit(ecomm_category $ecomm_category)
    {
        $ecomm = ecomm::find($ecomm_category->ecomm_id);
        return view('admin.ecomm_categories.edit', ['ecomm_category' => $ecomm_category, 'user' => Auth::user(), 'ecomm' => $ecomm]);
    }

    public function edit_ecomm_categories(ecomm_category $ecomm_category)
    {
        $ecomm = ecomm::find($ecomm_category->ecomm_id);
        return view('admin.ecomm_categories.edit_ecomm_categories', ['ecomm_category' => $ecomm_category, 'ecomm' => $ecomm, 'user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $ecomm_category = ecomm_category::find($request->id);
        if ($request->image_path) {
            storage::disk('public')->delete($ecomm_category->image_path);
            $name = $request->image_path->getClientOriginalName();
            $path = $request->image_path->storeAs('files', $name, 'public');
            $ecomm_category->image_path = $path;
        }
        $ecomm_category->title = $request->title;
        $ecomm_category->parent_id = $request->parent_id;

        if ($request->show_in_home) {
            $ecomm_category->show_in_home = 1;
        } else {
            $ecomm_category->show_in_home = 0;
        }

        $ecomm_category->description = $request->description;
        $ecomm_category->save();
        $ecomm = ecomm::find($ecomm_category->ecomm_id);
        return view('admin.ecomm_categories.index', ['user' => Auth::user()]);
    }

    public function update_ecomm_categories(Request $request)
    {
        $ecomm_category = ecomm_category::find($request->id);
        if ($request->image_path) {
            storage::disk('public')->delete($ecomm_category->image_path);
            $name = $request->image_path->getClientOriginalName();
            $path = $request->image_path->storeAs('files', $name, 'public');
            $ecomm_category->image_path = $path;
        }

        $ecomm_category->title = $request->title;
        $ecomm_category->parent_id = $request->parent_id;
        if ($request->show_in_home) {
            $ecomm_category->show_in_home = 1;
        } else {
            $ecomm_category->show_in_home = 0;
        }
        $ecomm_category->description = $request->description;
        $ecomm_category->save();
        $ecomm = ecomm::find($ecomm_category->ecomm_id);
        return to_route('ecomm_category.ecomm_categories', [$ecomm]);
    }

    public function delete(ecomm_category $ecomm_category)
    {
        $ecomm_category->delete($ecomm_category);
        $ecomm_categories = ecomm_category::with('parent')->get();
        //  if($ecomm_category->ecomm_products){
        //             foreach($ecomm_category->ecomm_products as $ecomm_product){
        //                          $ecomm_product->delete();
        //             }
        //         }
           
        // return to_route('ecomm_category.index',['ecomm_categories'=>$ecomm_categories]);
        return back();
    }

     public function getEcommCategories(Request $request){
        // dd($request->all);
          if($request->key=="all"){
              $categories=Auth::user()->ecomm_categories;

          }else{
              $categories=ecomm_category::where('ecomm_id',$request->key)->get();

          }
         return response()->json(['categories' =>$categories]);
    }

    public function ecomm_categories(ecomm $ecomm){
          $user= Auth::user();
        return view('admin.ecomm_categories.ecomm_categories',['ecomm'=>$ecomm,'user'=>$user]);
    }
}
