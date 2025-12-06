<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\role;
use App\Models\role_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function create()
    {
        return view('client.signup');
    }

    public function store(Request $request)
    {
        if ($request->rules) {
            $phone = User::where('phoneNumber', $request->phoneNumber)->first();
            if ($phone) {
                return redirect()->back()->with('message', 'این شماره تلفن قبلا استفاده شده');
            }
            $password = Hash::make($request->password);
            $user_id=User::insertGetId([
                'name'=>$request->name,
                'family'=>$request->family,
                'phoneNumber'=>$request->phoneNumber,
                'password'=>$password,
            ]);
            role_user::create(['role_id'=>3,'user_id'=>$user_id]);
            return to_route('login');
        }
        return to_route('signup');
    }

    public function check(Request $request)
    {
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        
        if ($user) {
            $checkHash = Hash::check($request->password, $user->password);
            if ($checkHash) {
                // return $user;
                $user->role;
                Auth::login($user);
                return to_route('user.profile', [$user]);
            }
            return to_route('login');
        }
        return to_route('signup');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('home');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    public function panel()
    {
        $user=Auth::user();
                $user->role;

        if (!Auth::check()) {
            return to_route('login');
        }
        return view('admin.user.panel', ['user' => $user]);
    }

    public function profile(){
        $user=Auth::user();
        $user->role;
        return view('admin.user.profile', ['user'=>$user]);
    }
    public function show(user $user)
    {
        return view('admin.user.single', ['user' => $user]);
    }
    public function edit(user $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->family = $request->family;
        $user->phoneNumber = $request->phoneNumber;
        $user->email = $request->email;
       
        if ($request->password) {
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        if($request->main_image){
            Storage::disk('public')->delete($user->main_image);
            $name = $request->main_image->getClientOriginalName();
            $fullName = time()."_".$name;
            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
            $user->main_image = $path;
        }
        $user->save();
        return to_route('user.profile',[Auth::user()]);
    }
    public function delete(user $user)
    {
        foreach ($user->careers as $career) {
            $career->delete();
        }
        $user->delete();
        return to_route('user.list');
    }

    public function login()
    {
        return view('client.login');
    }

    public function compelete_form(){
        return view('admin.user.compelete_form', ['user'=>Auth::user()->role]);
    }

    public function save(Request $request){
        $user = Auth::user();
                $user->role;

        $name = $request->main_image->getClientOriginalName();
        $fullName = time()."_".$name;
        $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
        $user->main_image = $path;
        $user->email = $request->email;
        $user->save();
        return to_route('user.profile', [Auth::user()]);
    }
    public function set_order(Request $request)
    {
        dd($request->all());
        foreach($request->titles as $key=>$title){
            order::create([
                'career_id'=>$request->career ,
                'slug'=>$request->slug ,
                'title'=>$request->title,
                'count'=>$request->count
            ]);
        }

    }
    public function setting(){
        return view('admin.user.setting');
    }
}