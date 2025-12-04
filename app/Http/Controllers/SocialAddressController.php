<?php

namespace App\Http\Controllers;
use App\Models\social_address;
use App\Models\socialMedia;
use App\Models\covers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class SocialAddressController extends Controller
{
      public function create(covers $covers=null)
    {
        $socialMedias=socialMedia::all();
        return view('admin.socialAddress.create',['socialMedias' => $socialMedias,'covers'=>$covers]);
    }
    public function store(Request $request)
    {

        $socialMedia=socialMedia::find($request->socialMedia_id);
        social_address ::create([
            'socialMedia_id' => $request->socialMedia_id,
            'user_id' => Auth::id(),
            'covers_id' => $request->covers_id,
            'username' =>  $socialMedia->link . $request->username ,
        ]);
        return to_route('covers.single', [$request->covers_id]);
    }
       public function index()
    {
        $socialAddresses = social_address::all();
        return view('admin.socialAddress.index', ['socialAddresses' => $socialAddresses]);
    }

    public function edit(social_address $socialAddress)
    {
    //   dd($socialAddress->socialMedia);
        $socialMedias=socialMedia::all();
        return view('admin.socialAddress.edit', ['socialAddress' => $socialAddress,'socialMedias' => $socialMedias]);
    }

    public function update(Request $request)
    {
        $social_address = social_address::find($request->id);
        $social_address->socialMedia_id = $request->socialMedia_id;
        $social_address->username = $request->username;
        $social_address->save();
        return to_route('socialAddress.list');
        
    }

    public function delete(social_address $social_address)
    {
        $social_address->delete();
        return to_route('socialAddress.list');

    }
}
