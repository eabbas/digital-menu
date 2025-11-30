<?php

namespace App\Http\Controllers;
use App\Models\covers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CoversController extends Controller
{
       public function create()
    {
        return view('admin.covers.create');
    }

    public function store(Request $request)
    {
        $logoName = $request->logo_path->getClientOriginalName();
        $logoPath = $request->logo_path->storeAs('logo_cover', $logoName, 'public');

        $coverName = $request->cover_path->getClientOriginalName();
        $coverPath = $request->cover_path->storeAs('logo_cover', $coverName, 'public');
        covers::create([
            'title' => $request->title,
            'subTitle' => $request->subTitle,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'logo_path' => $logoPath,
            'cover_path' => $coverPath,

        ]);
        return to_route('covers.list');
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
        if ($request->logo_path) {
            Storage::disk('public')->delete($covers->logo_path);
            $logoName = $request->logo_path->getClientOriginalName();
            $logoPath = $request->logo_path->storeAs('logo_cover', $logoName, 'public');
            $covers->logo_path = $logoPath;
        }
        if ($request->cover_path) {
            Storage::disk('public')->delete($covers->icon_path);
            $coverName = $request->icon_path->getClientOriginalName();
            $coverPath = $request->icon_path->storeAs('logo_cover', $coverName, 'public');
            $covers->icon_path = $coverPath;
        }
        $covers->title = $request->title;
        $covers->subTitle = $request->subTitle;
        $covers->description = $request->description;
        $covers->save();
    }

    public function delete(covers $covers)
    {
        $covers->delete();
    }
}
