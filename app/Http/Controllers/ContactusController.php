<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactus;
use Illuminate\Support\Facades\Auth;


class ContactusController extends Controller
{
    public function createContactus(){
        return view('contactuses.create');
    }
    public function storeContactus(Request $request){
        contactus::create($request->all());
        
    }
    public function indexContactus(){
        $user=Auth::user();

        $contactuses=contactus::all();
        return view('contactuses.listContactus',['contactuses'=>$contactuses,'user'=>$user]);
    }
    public function showContactus(contactus $contactus){
        $user=Auth::user();
        return view('contactuses.show',['contactus'=>$contactus,'user'=>$user]);
    }
    public function editContactus(contactus $contactus){
        $user=Auth::user();
        return view('contactuses.edit',['contactus'=>$contactus,'user'=>$user]);
    }
    public function updateContactus(Request $request){
        $contactus=contactus::find($request->id);
        $contactus->name=$request->name;
        $contactus->family=$request->family;
        $contactus->phone=$request->phone;
        $contactus->email=$request->email;
        $contactus->description=$request->description;
        $contactus->save();
        return to_route('contactus.list');

    }
    public function deleteContactus(contactus $contactus){
     $contactus->delete();
     return to_route('contactus.list');
    }
}
