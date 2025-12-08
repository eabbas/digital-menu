<?php
namespace App\Http\Controllers;

use App\Models\career;
use App\Models\careerCategory;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function create(User $user = null)
    {
        $careerCategories = careerCategory::all();
        if ($user) {
            $user->role[0];
            return view('admin.careers.create', ['user' => $user, 'careerCategories' => $careerCategories]);
        }
        return view('admin.careers.create', ['user' => Auth::user()->role, 'careerCategories' => $careerCategories]);
    }

    public function store(Request $request)
    {
        $roles = role::all();
        $user = Auth::user();
        if ($user->role[0]->title != 'admin') {
            $user->role[0] = $roles[1];
            $user->save();
        }
        
        $name = $request->logo->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $path = $request->file('logo')->storeAs('files', $fullName, 'public');
        $bannerName = $request->banner->getClientOriginalName();
        $fullBannerName = Str::uuid() . '_' . $bannerName;
        $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
        $social_medias = json_encode($request->social_medias);
        $career_id = career::insertGetId([
            'title' => $request->title,
            'logo' => $path,
            'province' => $request->province,
            'city' => $request->city,
            'address' => $request->address,
            'social_media' => $social_medias,
            'user_id' => $user->id,
            'email' => $request->email,
            'description' => $request->description,
            'career_category_id' => $request->careerCategory,
            'banner' => $bannerPath,
        ]);
        return to_route('career.careers', [Auth::user()]);
    }

    public function user_careers(User $user = null)
    {
        if ($user) {
            $user->role;
            return view('admin.careers.userCareers', ['user' => $user]);
        }
        return view('admin.careers.userCareers', ['user' => Auth::user()]);
    }

    public function edit(career $career, User $user = null)
    {
        if (!$user) {
            $user = Auth::user();
            $user->role;
        }
        $careerCategories = careerCategory::all();
        $career->social_media = json_decode($career->social_media);
        return view('admin.careers.edit', ['career' => $career, 'user' => $user, 'careerCategories' => $careerCategories]);
    }

    public function update(Request $request)
    {
        $career = career::find($request->id);
        if (isset($request->logo)) {
            Storage::disk('public')->delete($career->logo);
            $logoName = $request->logo->getClientOriginalName();
            $fullLogoName = Str::uuid() . '_' . $logoName;
            $logoPath = $request->file('logo')->storeAs('files', $fullLogoName, 'public');
            $career->logo = $logoPath;
        }
        if (isset($request->banner)) {
            if ($career->banner) {
                Storage::disk('public')->delete($career->banner);
            }
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = Str::uuid() . '_' . $bannerName;
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
        $career->user_id = $request->user_id;
        $career->save();
        $user=user::find($request->user_id);
        return  to_route('career.careers', ['user' => $user]);
    }

    public function delete(career $career)
    {
        if ($career->menu) {
            foreach ($career->menu->qr_codes as $qr_code) {
                $qr_code->delete();
            }
            if (count($career->menu->menu_categories)) {
                foreach ($career->menu->menu_categories as $category) {
                    if (count($category->menu_items)) {
                        foreach ($category->menu_items as $item) {
                            if (count($item->ingredients)) {
                                foreach ($item->ingredients as $ingredients) {
                                    $ingredients->delete();
                                }
                            }
                            $item->delete();
                        }
                    }
                    $category->delete();
                }
            }
            $career->menu->delete();
        }
        $career->delete();
        return to_route('user.profile', [Auth::user()]);
    }

    public function index()
    {
        $careers = career::all();
        return view('admin.careers.index', ['careers' => $careers]);
    }

    public function single(career $career)
    {
        return view('admin.careers.single', ['career' => $career]);
    }
}
