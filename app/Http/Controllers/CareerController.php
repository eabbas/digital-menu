<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\careerCategory;

class CareerController extends Controller
{
    public function create(User $user=null)
    {
        $careerCategories = careerCategory::all();
        if($user){
            return view('admin.careers.create', ['user' => $user, 'careerCategories'=>$careerCategories]);
        }
        return view('admin.careers.create', ['user'=>Auth::user(), 'careerCategories'=>$careerCategories]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        $user = Auth::user();
        if($user->type != 'admin'){
            $user->type = 'career';
            $user->save();
        }
        $name = $request->logo->getClientOriginalName();
        $fullName =  Str::uuid()."_".$name;
        $path = $request->file('logo')->storeAs('files', $fullName, 'public');

        $bannerName = $request->banner->getClientOriginalName();
        $fullBannerName = Str::uuid()."_".$bannerName;
        $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
        $social_medias = json_encode($request->social_medias);
        career::insertGetId([
            'title' => $request->title,
            'logo' => $path,
            'province' => $request->province,
            'city' => $request->city,
            'address' => $request->address,
            'social_media' => $social_medias,
            'user_id' => $user->id,
            'email' => $request->email,
            'description' => $request->description,
            'career_category_id'=>$request->careerCategory,
            'banner'=>$bannerPath
        ]);
        return to_route('career.careers', [Auth::user()]);
    }

    public function user_careers(User $user=null)   
    {
        if($user){
            return view('admin.careers.userCareers', ['user' => $user]);
        } 
        return view('admin.careers.userCareers', ['user' => Auth::user()]);
    }

    public function edit(career $career, User $user=null)
    {
        if(!$user){
            $user = Auth::user();
        }
        $careerCategories = careerCategory::all();
        $career->social_media = json_decode($career->social_media);
        return view('admin.careers.edit', ['career' => $career, 'user' => $user, 'careerCategories'=>$careerCategories]);
    }

    public function update(Request $request)
    {
        $career = career::find($request->id);
        if ($request->logo) {
            Storage::disk('public')->delete($career->logo);
            $logoName = $request->logo->getClientOriginalName();
            $fullLogoName = Str::uuid()."_".$logoName;
            $logoPath = $request->file('logo')->storeAs('files', $fullLogoName, 'public');
            $career->logo = $logoPath;
        }
        if ($request->banner) {
            if ($career->banner) {
                Storage::disk('public')->delete($career->banner);
            }
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = Str::uuid()."_".$bannerName;
            $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
            $career->banner = $bannerPath;
        }
        $career->social_media = json_encode($request->social_medias);
        $career->province = $request->province;
        $career->city = $request->city;
        $career->title = $request->title;
        $career->address = $request->address;
        $career->description = $request->description;
        $career->email = $request->email;
        $career->save();
        return view('admin.careers.userCareers', ['user' => Auth::user()]);
    }

    public function delete(career $career)
    {
        if ($career->menu) {
            if ($career->menu->qr_codes) {
                foreach ($career->menu->qr_codes as $menu) {
                    $menu->delete();
                }
            }
            $career->menu->delete();
        }
        $career->delete();
        return to_route('user.profile', [Auth::user()]);
    }
    public function index()
    {
        $careers=career::all();
        return view('admin.careers.index',['careers'=>$careers]);
    }
    public function single(career $career){
        return view('admin.careers.single', ['career'=>$career]);
    }
}
