<?php
namespace App\Http\Controllers;

use App\Models\order;
use App\Models\phone_code;
use App\Models\role;
use App\Models\role_user;
use App\Models\User;
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
            $user_id = User::insertGetId([
                'name' => $request->name,
                'family' => $request->family,
                'phoneNumber' => $request->phoneNumber,
                'password' => $password,
            ]);
            role_user::create(['role_id' => 3, 'user_id' => $user_id]);
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
                Auth::login($user);
                return to_route('user.profile');
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
        if (!Auth::check()) {
            return to_route('login');
        }
        return view('admin.app.panel');
    }

    public function profile()
    {
        return view('admin.user.profile');
    }

    public function show(user $user)
    {
        return view('admin.user.single', ['user' => $user]);
    }

    public function edit(user $user)
    {
        $roles = role::all();
        return view('admin.user.adminUserEdit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->user_id);
        if (isset($request->role)) {
            role_user::where('user_id', $user->id)->delete();
            role_user::create([
                'user_id' => $user->id,
                'role_id' => $request->role
            ]);
        }
        $user->name = $request->name;
        $user->family = $request->family;
        if (isset($request->phoneNumber)) {
            $user->phoneNumber = $request->phoneNumber;
        }
        if (isset($request->email)) {
            $user->email = $request->email;
        }
        if ($request->password) {
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        if ($request->main_image) {
            if ($user->main_image) {
                Storage::disk('public')->delete($user->main_image);
            }
            $name = $request->main_image->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
            $user->main_image = $path;
        }
        $user->save();
        return redirect()->back();
    }

    public function delete(user $user)
    {
        foreach ($user->careers as $career) {
            $career->delete();
        }
        $user->delete();
        return to_route('user.list');
    }
    public function deleteAll(Request $request)
    {
        if(!isset($request->users)){
            return redirect()->back();
        }
        foreach($request->users as $user_id){
            $user = User::find($user_id);
            foreach ($user->careers as $career) {
                $career->delete();
            }
            $user->delete();
        }
        return redirect()->back();
    }

    public function login()
    {
        return view('client.login');
    }

    public function compelete_form()
    {
        return view('admin.user.compelete_form');
    }

    public function save(Request $request)
    {
        $user = Auth::user();
        $user->role;
        if (isset($request->main_image)) {
            $name = $request->main_image->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
            $user->main_image = $path;
        }
        $user->email = $request->email;
        $user->save();
        return to_route('user.profile');
    }

    public function set_order(Request $request)
    {
        dd($request->all());
        foreach ($request->titles as $key => $title) {
            order::create([
                'career_id' => $request->career,
                'slug' => $request->slug,
                'title' => $request->title,
                'count' => $request->count
            ]);
        }
    }

    public function setting()
    {
        return view('admin.user.userEdit');
    }

    public function checkAuth(Request $request)
    {
        $bool = false;
        $user['validate'] = User::where('phoneNumber', $request->phoneNumber)->first();
        $code = phone_code::where('phoneNumber', $request->phoneNumber)->first();
        if ($code->code == $request->code) {
            $bool = true;
        }
        $user['checkCode'] = $bool;
        return response()->json($user);
    }

    public function create_user()
    {
        $roles = role::all();
        return view('admin.user.create', ['roles' => $roles]);
    }

    public function store_user(Request $request)
    {
        $password = Hash::make($request->password);
        $path = null;
        if (isset($request->main_image)) {
            $name = $request->main_image->getClientOriginalName();
            $fullName = time() . '_' . $name;
            $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
        }
        $user_id = User::insertGetId([
            'name' => $request->name,
            'family' => $request->family,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'main_image' => $path,
            'password' => $password,
        ]);
        role_user::create([
            'user_id' => $user_id,
            'role_id' => $request->role
        ]);
        return to_route('user.list');
    }

    public function send_code(Request $request)
    {
        $code = rand(1000, 10000);
        phone_code::upsert(['phoneNumber' => $request->phoneNumber, 'code' => $code], ['phoneNumber'], ['code']);
        $apiKey = 'YTBhZjhlNDAtZGI1Zi00ZWQ1LTkwNmYtZWU2MWFhYTkzY2M0NTcxZGQ3ZjY2Yzk1MmNjZmFiM2M2ZjVmNjBhMDg2MTQ=';
        $client = new \IPPanel\Client($apiKey);
        $patternValues = [
            'activation_code' => $code,
        ];
        $bulkID = $client->sendPattern(
            '7fvdx77gveizxqn',  // pattern code
            '+983000505',  // originator
            $request->phoneNumber,  // recipient
            $patternValues,  // pattern values
        );
        return response()->json('ok');
    }

    public function forget_password(){
        return view('client.forgetPassword');
    }

    public function set_password(Request $request){
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        return view('client.setPassword', ['user'=>$user]);
    }

    public function save_password(Request $request){
        $user = User::find($request->user_id);
        $password = Hash::make($request->password);
        $user->password = $password;
        $user->save();
        return to_route('login');
    }
}
