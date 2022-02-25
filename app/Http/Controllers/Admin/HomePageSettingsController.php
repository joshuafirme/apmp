<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Cache;

class HomePageSettingsController extends Controller
{
    public function index(GeneralSetting $setting) { 
        $page_title = "Home Page Settings | " . $setting::getAppName();
        return view('admin.homepage-settings.index', compact('page_title', 'setting'));
    }

    public function updateCover() { 
        $img_path = "";
        if(request()->hasFile('image')){
            $root = 'assets/';       
            $folder_to_save = 'img';
            $image_name = uniqid() . "." . request()->image->extension();
            request()->image->move(public_path($root . $folder_to_save), $image_name);
            $img_path = $root . $folder_to_save . "/" . $image_name;
            Cache::put('cover_photo_cache', $img_path);
        }
        Cache::put('hp_active_tab', 'cover_photo');

        return redirect()->back()->with('success', 'Data was saved successfully.');
    }
}
