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
        return view('users.signup');
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
        // dd($request->all());
        $user = User::where('phoneNumber', $request->phoneNumber)->first();

        if (!$user) {
            return 'user not found';
        }
        $checkHash = Hash::check($request->password, $user->password);
        if ($checkHash) {
            if (!Auth::check()) {
                Auth::login($user);
                return to_route('user.single', ['user' => $user]);
            }
        } else {
            echo 'رمز ورود صحیح نمیباشد';
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
        return view('users.index', ['users' => $users]);
    }

    public function single(user $user)
    {
        if (!Auth::check()) {
            return to_route('user.login');
        }
        return view('users.userPanel', ['user' => $user]);
    }

    public function edit(user $user)
    {
        return view('users.edit', ['user' => $user]);
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
        return view('users.login');
    }
}
