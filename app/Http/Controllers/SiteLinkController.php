<?php

namespace App\Http\Controllers;
use App\Models\site_link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\covers;
class SiteLinkController extends Controller
{
       public function create(covers $covers=null)
    {
        return view('admin.siteLink.create',['covers'=>$covers]);
    }

    public function store(Request $request)
    {
        $name = $request->icon_path->getClientOriginalName();
        $path = $request->icon_path->storeAs('socialMedia', $name, 'public');
        site_link::create([
            'address' => $request->address,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'covers_id' => $request->covers_id,
            'icon_path'=>$path

        ]);
        return to_route('siteLink.list');
    }
        public function index()
    {
        $siteLinks = site_link::all();
        return view('admin.siteLink.index', ['siteLinks' => $siteLinks]);
    }
    public function edit(site_link $siteLink)
    {
        return view('admin.siteLink.edit', ['siteLink' => $siteLink]);
    }

    public function update(Request $request)
    {
        $siteLink = site_link::find($request->id);
        if ($request->icon_path) {
            Storage::disk('public')->delete($siteLink->icon_path);
            $name = $request->icon_path->getClientOriginalName();
            $path = $request->icon_path->storeAs('socialMedia', $name, 'public');
            $siteLink->icon_path = $path;
        }
        $siteLink->address = $request->address;
        $siteLink->title = $request->title;
        $siteLink->save();
        return to_route('siteLink.list');

    }

    public function delete(site_link $siteLink)
    {
        $siteLink->delete();
        return to_route('siteLink.list');

    }
}
