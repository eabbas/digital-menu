<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('client.signup');
    }

    public function store(Request $request)
    {
        $phone = User::where('phoneNumber', $request->phoneNumber)->first();
        if ($phone) {
            return redirect()->back()->with('message', 'این شماره تلفن قبلا استفاده شده');
        }
        $password = Hash::make($request->password);
        User::create([
            'name'=>$request->name,
            'family'=>$request->family,
            'phoneNumber'=>$request->phoneNumber,
            'password'=>$password,
            'type'=>'general',
        ]);
        return to_route('login');
    }

    public function check(Request $request)
    {
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        if ($user) {
            $checkHash = Hash::check($request->password, $user->password);
            if ($checkHash) {
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
        return to_route('login');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    public function panel()
    {
        $user=Auth::user();
        if (!Auth::check()) {
            return to_route('login');
        }
        return view('admin.user.panel', ['user' => $user]);
    }

    public function profile(){
        $user=Auth::user();
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
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->phoneNumber = $request->phoneNumber;
        $user->type = $request->type;
        if ($request->password) {
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        $user->save();
        return redirect('/user/index');
    }
    

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user/index');
    }

    public function login()
    {
        return view('client.login');
    }

    public function compelete_form(){
        return view('admin.user.compelete_form', ['user'=>Auth::user()]);
    }

    public function save(Request $request){
        $user = Auth::user();
        $name = $request->main_image->getClientOriginalName();
        $fullName = time()."_".$name;
        $path = $request->file('main_image')->storeAs('images', $fullName, 'public');
        $user->main_image = $path;
        $user->email = $request->email;
        $user->save();
        return to_route('user.profile', [Auth::user()]);
    }
    public function adminCreate(){
        return view('admin.user.createAdmin');
    }
      public function adminStore(Request $request)
    {
        $phone = User::where('phoneNumber', $request->phoneNumber)->first();
        if ($phone) {
            return redirect()->back()->with('message', 'این شماره تلفن قبلا استفاده شده');
        }
        $password = Hash::make($request->password);
        User::create([
            'name'=>$request->name,
            'family'=>$request->family,
            'phoneNumber'=>$request->phoneNumber,
            'password'=>$password,
            'type'=>'admin'
        ]);
        return to_route('login');
    }
}
