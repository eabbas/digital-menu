<?php

namespace App\Http\Controllers;

use App\Models\pages;
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

class pagesController extends Controller
{
    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $logoPath = null;
        $coverPath = null;
        if (isset($request->logo_path)) {
            $logoName = $request->logo_path->getClientOriginalName();
            $fullLogoName = time() . '_' . $logoName;
            $logoPath = $request->logo_path->storeAs('logo_page', $fullLogoName, 'public');
        }
        if (isset($request->cover_path)) {
            $pageName = $request->cover_path->getClientOriginalName();
            $fullPageName = time() . '_' . $pageName;
            $coverPath = $request->cover_path->storeAs('logo_page', $fullPageName, 'public');
        }
        $page_id = pages::insertGetId([
            'title' => $request->title,
            'subTitle' => $request->subTitle ? $request->subTitle : null,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'logo_path' => $logoPath,
            'cover_path' => $coverPath,
        ]);
        $random = Str::random(10);
        $link = "famenu.ir/qrcodes/links/$page_id/" . $random;
        $qr_svg = QrCode::size(100)->generate($link);
        $fileName = 'qrcodes/' . $page_id . '_' . $random . '.svg';
        Storage::disk('public')->put($fileName, $qr_svg);
        social_qr_codes::create([
            'qr_path' => $fileName,
            'page_id' => $page_id,
            'slug' => 'qrcodes/links/' . $page_id . '/' . $random
        ]);
        return to_route('pages.social_list');
    }

    public function social_list()
    {
        return view('admin.pages.social_list');
    }

    public function index()
    {
        $pages = pages::all();
        return view('admin.pages.index', ['pages' => $pages]);
    }

    public function edit(pages $pages)
    {
        return view('admin.pages.edit', ['pages' => $pages]);
    }

    public function update(Request $request)
    {
        $pages = pages::find($request->id);
        if (isset($request->logo_path)) {
            if ($pages->logo_path) {
                Storage::disk('public')->delete($pages->logo_path);
            }
            $logoName = $request->logo_path->getClientOriginalName();
            $logoPath = $request->logo_path->storeAs('logo_page', $logoName, 'public');
            $pages->logo_path = $logoPath;
        }
        if (isset($request->cover_path)) {
            if ($pages->cover_path) {
                Storage::disk('public')->delete($pages->cover_path);
            }
            $pageName = $request->cover_path->getClientOriginalName();
            $coverPath = $request->cover_path->storeAs('logo_page', $pageName, 'public');
            $pages->cover_path = $coverPath;
        }
        $pages->title = $request->title;
        $pages->subTitle = $request->subTitle;
        $pages->description = $request->description;
        $pages->save();
        if (Auth::user()->role[0]->title == 'admin') {
            return to_route('pages.list');
        }
        return to_route('pages.social_list');
    }

    public function delete(pages $pages)
    {
        $socialAddresses = social_address::where('page_id', $pages->id)->get();
        $site_links = site_link::where('page_id', $pages->id)->get();
        foreach ($socialAddresses as $address) {
            $address->delete();
        }
        foreach ($site_links as $site_link) {
            $site_link->delete();
        }
        $pages->social_qr_codes->delete();
        $pages->delete();
        if (Auth::user()->role[0]->title == 'admin') {
            return to_route('pages.list');
        }
        return to_route('pages.social_list');
    }

    public function single(pages $pages)
    {
        $socialMedias = socialMedia::all();
        return view('admin.pages.single', ['page' => $pages, 'socialMedias' => $socialMedias]);
    }

    public function deleteAll(Request $request)
    {
        foreach ($request->pages as $page_id) {
            $page = pages::find($page_id);
            $socialAddresses = social_address::where('page_id', $page->id)->get();
            $site_links = site_link::where('page_id', $page->id)->get();
            foreach ($socialAddresses as $address) {
                $address->delete();
            }
            foreach ($site_links as $site_link) {
                $site_link->delete();
            }
            $page->social_qr_codes->delete();
            $page->delete();
        }
        return redirect()->back();
    }
}
