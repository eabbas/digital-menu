<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\career;
use App\Models\qr_code;
use App\Models\User;
use App\Models\Menu;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function create(){
        $user = Auth::user();
        return view('careers.create', ['user'=>$user]);
    }
    
    public function store(Request $request){
        $user=Auth::user();
        $user->type="career";
        $user->save();
        $name=$request->logo->getClientOriginalName();
        $path=$request->logo->storeAs('files',$name,'public');
        $social_medias=json_encode($request->social_medias);
        $career_id=career::insertGetId([
            'title'=>$request->title,
            'logo'=>$path,
            'province'=>$request->province,
            'city'=>$request->city,
            'address'=>$request->address,
            'social_media'=>$social_medias,
            'user_id'=>$user->id,
            'email'=>$request->email,
            'description'=>$request->description,
        ]);
        $random = Str::random(10);
        $link = "https://famenu.ir/qrcode/$career_id/".$random;
        $qr_svg=QrCode::size(100)->generate($link);
        $fileName = "qrcodes/".$career_id."_".$random.".svg";
        Storage::disk('public')->put($fileName, $qr_svg);
        qr_code::create(['qr_path'=>$fileName,'career_id'=>$career_id,'is_main'=>1, 'slug'=>$career_id."/".$random]);
        return view("user.profile",["user"=>$user]);
    }
    public function user_careers(){
        $user = Auth::user();
        return view("careers.userCareers",["user"=>$user]);

    }
    public function edit(career $career){
        $user = Auth::user();
        $career->social_media=json_decode($career->social_media);
        return view("careers.edit",["career"=>$career, 'user'=>$user]);
    }
    public function update(Request $request){
        $user=Auth::user();
        $career = career::find($request->id);
        if($request->logo){
            Storage::disk('public')->delete($career->logo);
            $logoName=$request->logo->getClientOriginalName();
            $logoPath=$request->logo->storeAs('files',$logoName,'public');
            $career->logo = $logoPath;
        }
        $career->social_media=json_encode($request->social_medias);
        $career->province = $request->province;
        $career->city = $request->city;
        $career->title = $request->title;
        $career->address = $request->address;
        $career->description = $request->description;
        $career->email = $request->email;
        $career->save();
        return view("careers.userCareers",["user"=>$user]);
    }
    public function delete(career $career){
        $user = Auth::user();
        foreach ($career->menu->qr_codes as $menu) {
            $menu->delete();
        }
        $career->menu->delete();
        $career->delete();
        return to_route('user.profile', [$user]);
    }
}
