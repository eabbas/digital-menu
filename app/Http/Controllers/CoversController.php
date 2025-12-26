<?php

namespace App\Http\Controllers;

use App\Models\covers;
use App\Models\site_link;
use App\Models\social_address;
use App\Models\social_qr_codes;
use App\Models\socialMedia;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CoversController extends Controller
{
    public function create()
    {
        return view('admin.covers.create');
    }

    public function store(Request $request)
    {
        $logoPath = null;
        $coverPath = null;
        if (isset($request->logo_path)) {
            $logoName = $request->logo_path->getClientOriginalName();
            $fullLogoName = time() . '_' . $logoName;
            $logoPath = $request->logo_path->storeAs('logo_cover', $fullLogoName, 'public');
        }
        if (isset($request->cover_path)) {
            $coverName = $request->cover_path->getClientOriginalName();
            $fullCoverName = time() . '_' . $coverName;
            $coverPath = $request->cover_path->storeAs('logo_cover', $fullCoverName, 'public');
        }
        $cover_id = covers::insertGetId([
            'title' => $request->title,
            'subTitle' => $request->subTitle ? $request->subTitle : null,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'logo_path' => $logoPath,
            'cover_path' => $coverPath,
        ]);
        $random = Str::random(10);
        $link = "famenu.ir/qrcodes/links/$cover_id/" . $random;
        $qr_svg = QrCode::size(100)->generate($link);
        $fileName = 'qrcodes/' . $cover_id . '_' . $random . '.svg';
        Storage::disk('public')->put($fileName, $qr_svg);
        social_qr_codes::create([
            'qr_path' => $fileName,
            'covers_id' => $cover_id,
            'slug' => $random
        ]);
        return to_route('covers.social_list');
    }

    public function social_list()
    {
        return view('admin.covers.social_list');
    }

    public function index()
    {
        $covers = covers::all();
        return view('admin.covers.index', ['covers' => $covers]);
    }

    public function edit(covers $covers)
    {
        return view('admin.covers.edit', ['covers' => $covers]);
    }

    public function update(Request $request)
    {
        $covers = covers::find($request->id);
        if (isset($request->logo_path)) {
            if ($covers->logo_path) {
                Storage::disk('public')->delete($covers->logo_path);
            }
            $logoName = $request->logo_path->getClientOriginalName();
            $logoPath = $request->logo_path->storeAs('logo_cover', $logoName, 'public');
            $covers->logo_path = $logoPath;
        }
        if (isset($request->cover_path)) {
            if ($covers->cover_path) {
                Storage::disk('public')->delete($covers->cover_path);
            }
            $coverName = $request->cover_path->getClientOriginalName();
            $coverPath = $request->cover_path->storeAs('logo_cover', $coverName, 'public');
            $covers->cover_path = $coverPath;
        }
        $covers->title = $request->title;
        $covers->subTitle = $request->subTitle;
        $covers->description = $request->description;
        $covers->save();
        if(Auth::user()->role[0]->title == 'admin'){
            return to_route('covers.list');
        }
        return to_route('covers.social_list');
    }

    public function delete(covers $covers)
    {
        $socialAddresses = social_address::where('covers_id', $covers->id)->get();
        $site_links = site_link::where('covers_id', $covers->id)->get();
        foreach ($socialAddresses as $address) {
            $address->delete();
        }
        foreach ($site_links as $site_link) {
            $site_link->delete();
        }
        $covers->social_qr_codes->delete();
        $covers->delete();
         if(Auth::user()->role[0]->title == 'admin'){
            return to_route('covers.list');
        }
        return to_route('covers.social_list');
    }

    public function single(covers $covers)
    {
        $socialMedias = socialMedia::all();
        return view('admin.covers.single', ['cover' => $covers, 'socialMedias' => $socialMedias]);
    }
}
