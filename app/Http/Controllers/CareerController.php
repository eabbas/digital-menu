<?php
namespace App\Http\Controllers;
use App\Models\user;
use App\Models\career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('admin.careers.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if($user->type != 'admin'){
            $user->type = 'career';
            $user->save();
        }
        $name = $request->logo->getClientOriginalName();
        $path = $request->logo->storeAs('files', $name, 'public');
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
        ]);
        return to_route('user.profile', ['user' => $user]);
    }

    public function user_careers(User $user)
    {
        return view('admin.careers.userCareers', ['user' => $user]);
    }

    public function edit(career $career)
    {
        $user = Auth::user();
        $career->social_media = json_decode($career->social_media);
        return view('admin.careers.edit', ['career' => $career, 'user' => $user]);
    }

    public function update(Request $request)
    {
        $career = career::find($request->id);
        if ($request->logo) {
            Storage::disk('public')->delete($career->logo);
            $logoName = $request->logo->getClientOriginalName();
            $logoPath = $request->logo->storeAs('files', $logoName, 'public');
            $career->logo = $logoPath;
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
        $user = Auth::user();
        foreach ($career->menu->qr_codes as $menu) {
            $menu->delete();
        }
        $career->menu->delete();
        $career->delete();
        return to_route('user.profile', [$user]);
    }
    public function index()
    {
        $careers=career::all();
        // dd($careers);
        $user = Auth::user();
        return view('admin.careers.index',['careers'=>$careers, 'user'=>$user]);
    }
}
