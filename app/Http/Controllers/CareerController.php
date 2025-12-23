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
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\qr_code;

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
        $path = null;
        $bannerPath = null;
        if ($user->role[0]->title != 'admin') {
            $user->role[0] = $roles[1];
            $user->save();
        }
        if (isset($request->logo)) {
            $name = $request->logo->getClientOriginalName();
            $fullName = Str::uuid() . '_' . $name;
            $path = $request->file('logo')->storeAs('files', $fullName, 'public');
        }
        if (isset($request->banner)) {
            $bannerName = $request->banner->getClientOriginalName();
            $fullBannerName = Str::uuid() . '_' . $bannerName;
            $bannerPath = $request->file('banner')->storeAs('files', $fullBannerName, 'public');
        }
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
            'qr_count'=> $request->qr_count ? $request->qr_count : 0
        ]);
        for ($i = 0; $i < $request->qr_count; $i++) {
            $random = Str::random(10);
            $link = "famenu.ir/qrcode/$career_id/" . $random;
            $qr_svg = QrCode::size(100)->generate($link);
            $fileName = 'qrcodes/' . $career_id . '_' . $random . '.svg';
            Storage::disk('public')->put($fileName, $qr_svg);
            qr_code::create([
                'qr_path' => $fileName,
                'career_id' => $career_id,
                'slug' => 'qrcode/' . $career_id . '/' . $random,
                'user_id'=> Auth::id()
            ]);
        }
        return to_route('career.careers');
    }

    public function user_careers(user $user=null)
    {
        if(!$user){
            $user=Auth::user();
        }
        return view('admin.careers.userCareers',['user'=>$user]);
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
        $logoPath = null;
        $bannerPath = null;
        if (isset($request->logo)) {
            if ($career->logo) {
                Storage::disk('public')->delete($career->logo);
            }
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
        $career->career_category_id = $request->careerCategory;
        if ($request->qr_count) {
            if ((int) $request->qr_count > $career->qr_count) {
                $qr_count = (int) $request->qr_count - $career->qr_count;
                while ($qr_count) {
                    $random = Str::random(10);
                    $link = "famenu.ir/qrcodes/$career->id/" . $random;
                    $qr_svg = QrCode::size(100)->generate($link);
                    $fileName = 'qrcodes/' . $career->id . '_' . $random . '.svg';
                    Storage::disk('public')->put($fileName, $qr_svg);
                    qr_code::create([
                        'qr_path' => $fileName,
                        'career_id' => $career->id,
                        'slug' => 'qrcode/' . $career->id . '/' . $random,
                        'user_id'=>Auth::id()
                    ]);
                    $qr_count--;
                }
            }
            // if ($request->qr_num<=$menu->qr_num) {
            //     # code...
            // }
        }
        $career->qr_count = $request->qr_count;
        $career->save();
        return to_route('career.careers');
    }

    public function delete(career $career)
    {
        if (count($career->qr_codes)) {
            foreach($career->qr_codes as $qr_code){
                $qr_code->delete();
            }
        }
        if (count($career->menus)) {
            foreach($career->menus as $menu){
                if (count($menu->menu_categories)) {
                    foreach ($menu->menu_categories as $category) {
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
                $menu->delete();
            }
        }
        $career->delete();
        return to_route('career.careers');

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

    public function menus(career $career){
        return view('admin.careers.menuList', ['career'=>$career]);
    }

     public function qr_codes(career $career)
    {
        return view('admin.careers.qrcodes', ['career' => $career]);
    }
}
