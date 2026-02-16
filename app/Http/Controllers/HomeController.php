<?php

namespace App\Http\Controllers;

use App\Models\careerCategory;
use Illuminate\Http\Request;
use App\Models\slider;
use App\Models\career;
use App\Models\pages;
use App\Models\menu;
class HomeController extends Controller
{
    public function index()
    {
        $sliders = slider::all();
        $careerCategories = careerCategory::all();
        $careers = career::all();
        $pages = pages::all();

        return view('home', ['sliders' => $sliders, 'careerCategories' => $careerCategories, 'careers' => $careers, 'pages'=>$pages]);
    }

    public function search(Request $request)
    {
        if(!$request->search){

            $request->search = '';
        }
        $datas = [];
        $datas['title'] = $request->search;
        $datas['careers'] = career::where('title', 'like', "%" . $request->search . "%")->get();
        $datas['careerCategories'] = careerCategory::where('title', 'like', "%" . $request->search . "%")->get();
        $datas['socialMedias'] = covers::where('title', 'like', "%" . $request->search . "%")->get();
        $datas['menus'] = menu::where('title', 'like', "%" . $request->search . "%")->get();
        return view('client.search.index', ['datas' => $datas, 'searchTitle' => $request->search]);
    }

    public function filter(Request $request)
    {
        $relations = ['careerCategory' => 'career', 'career' => 'menus', 'covers' => 'social_address'];
        $datas = [];
        if (isset($request->models)) {
            if (in_array('all', $request->models)) {
                $datas['careerCategory'] = careerCategory::where('title', 'like', "%" . $request->searchTitle . "%")->get();
                $datas['career'] = career::where('title', 'like', "%" . $request->searchTitle . "%")->get();
                $datas['covers'] = covers::where('title', 'like', "%" . $request->searchTitle . "%")->get();
                $datas['menu'] = menu::where('title', 'like', "%" . $request->searchTitle . "%")->get();
            } else {
                if (isset($request->models)) {
                    foreach ($request->models as $model) {
                        $className = 'App\\Models\\' . $model;
                        $datas[$model] = $className::where('title', 'like', "%" . $request->searchTitle . "%")->get();
                        // foreach($relations as $key=>$value){
                        //     if(($className==$key)){
                        //         // $modelName = 'App\\Models\\' . $value;
                        //         foreach($datas[$model] as $data){
                        //             $datas=$data->$value;
                        //         }

                        //     }
                        // }

                    }
                }
            }
        }
        return response()->json($datas);

        $datas['careers'] = career::where('title' , 'like' , "%".$request->search."%")->get();
        $datas['careerCategories'] = careerCategory::where('title' , 'like' , "%".$request->search."%")->get();
        $datas['socialMedias'] = pages::where('title' , 'like' , "%".$request->search."%")->get();
        $datas['menus'] = menu::where('title' , 'like' , "%".$request->search."%")->get();
        
        return view('client.search.index' , ['datas'=>$datas, 'searchTitle'=>$request->search]);

    }
    
    // public function filter(Request $request){
    //     $datas = [];
    //     if(isset($request->models)){
    //         if(in_array('all', $request->models)){
    //             $datas['careerCategory'] = careerCategory::where('title' , 'like' , "%".$request->searchTitle."%")->get();
    //             $datas['career'] = career::where('title' , 'like' , "%".$request->searchTitle."%")->get();
    //             $datas['pages'] = pages::where('title' , 'like' , "%".$request->searchTitle."%")->get();
    //             $datas['menu'] = menu::where('title' , 'like' , "%".$request->searchTitle."%")->get();
    //         } else {
    //             if(isset($request->models)){
    //                 foreach($request->models as $model){
    //                     $className = 'App\\Models\\'.$model;
    //                     $datas[$model]=$className::where('title', 'like', "%".$request->searchTitle."%")->get();
    //                 }
    //             }
    //         }
    //     }
    //     return response()->json($datas);
    // }
    
}