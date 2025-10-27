<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('users.signup');
    
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $phone=User::where('phoneNumber',$request->phoneNumber)->first();
        if(!$phone){
            $password = Hash::make($request->password);
            User::create([
                "name" => $request->name,
                "phoneNumber" => $request->phoneNumber,
                "password" => $password,
                "type"=>"general"
            ]);
            return redirect("/user/login");
        }
        else{
            return redirect()->back()->with("message","این شماره تلفن قبلا استفاده شده");
   
        }
    }
    public function check(Request $request)
    {
        $user=user::where('phoneNumber',$request->phoneNumber)->first();
        if(!$user){
         return"user not found";
        }
        $checkHash=Hash::check($request->password,$user->password);
            if($checkHash){
                if(!Auth::check()){
                        Auth::login($user);
                        return view("users.userPanel",["user"=>$user]);
                }
            else{
              return view("users.userPanel",["user"=>$user]); 
         }
    }
    else{
      echo  "رمز ورود صحیح نمیباشد";
    }  
    }
    public function logout()
    {
        Auth::logout();
        // return"شمااز حساب کاربری خود خارج شدید";
        return redirect("/user/login");

        // return redirect("/");
    }
    public function index()
    {
        $users = User::all();
        return view('users.index', ["users" => $users]);
    }
    public function show($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }
        if (!Auth::check()) {
            return to_route("users.login");
        }
        if ($id){
            $user = User::find($id);
        }
        return view("users.userPanel", ["user" => $user]);
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view("users.edit", ["user" => $user]);
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
        return redirect("/user/index");
    }
    public function delete($id){
        $user=User::find($id);
        $user->delete();
        return redirect("/user/index");

    }
}