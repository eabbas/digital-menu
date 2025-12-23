<?php

namespace App\Http\Controllers;

use App\Models\covers;
use App\Models\social_address;
use App\Models\socialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SocialAddressController extends Controller
{
    public function create(covers $covers)
    {
        $socialMedias = socialMedia::all();
        return view('admin.socialAddress.create', ['socialMedias' => $socialMedias, 'covers' => $covers]);
    }

    public function store(Request $request)
    {
        $socialAddress = social_address::insertGetId([
            'socialMedia_id' => $request->socialMedia_id,
            'user_id' => Auth::id(),
            'covers_id' => $request->cover_id,
            'username' => $request->userName,
        ]);
        $data['address'] = social_address::find($socialAddress);
        $data['socialMedia'] = socialMedia::find($request->socialMedia_id);
        return response()->json($data);
    }

    public function index()
    {
        $socialAddresses = social_address::all();
        return view('admin.socialAddress.index', ['socialAddresses' => $socialAddresses]);
    }

    public function edit(social_address $socialAddress)
    {
        $datas['socialMedias'] = socialMedia::all();
        $datas['data'] = $socialAddress;
        return response()->json($datas);
    }

    public function update(Request $request)
    {
        $social_address = social_address::find($request->id);
        $social_address->username = $request->username;
        $social_address->covers_id = $request->cover_id;
        $social_address->save();
        return response()->json($social_address);
    }

    public function delete(Request $request)
    {
        $id = $request->input('social_address_id');
        $social_address = social_address::find($id);
        $social_address->delete();
        return response()->json('ok');
    }
}
