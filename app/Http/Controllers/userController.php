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
        return view('user.signup');
    }

    public function store(Request $request)
    {
        $phone = User::where('phoneNumber', $request->phoneNumber)->first();
        if (!$phone) {
            $password = Hash::make($request->password);
            User::create([
                'name' => $request->name,
                'phoneNumber' => $request->phoneNumber,
                'password' => $password,
                'type' => 'general',
            ]);
            return to_route('user.login');
        } else {
            return redirect()->back()->with('message', 'این شماره تلفن قبلا استفاده شده');
        }
    }

    public function check(Request $request)
    {
        $user = User::where('phoneNumber', $request->phoneNumber)->first();
        $checkHash = Hash::check($request->password, $user->password);

        if (!$user) {
            return to_route('user.signup');
        }
        if ($checkHash) {
            Auth::login($user);
            return to_route('user.profile', [$user]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return to_route('user.login');
    }

    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    public function panel()
    {
        $user=Auth::user();
        if (!Auth::check()) {
            return to_route('user.login');
        }
        return view('user.panel', ['user' => $user]);
    }

    public function profile(){
        $user=Auth::user();
        return view('user.profile', ['user'=>$user]);
    }

    public function edit(user $user)
    {
        return view('user.edit', ['user' => $user]);
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
        return view('user.login');
    }
}
