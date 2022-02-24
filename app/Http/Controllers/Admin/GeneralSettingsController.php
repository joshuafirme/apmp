<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Cache;

class GeneralSettingsController extends Controller
{
    public function index(GeneralSetting $setting) { 
        $page_title = "General Settings | " . $setting::getAppName();
        return view('admin.general-settings.index', compact('page_title', 'setting'));
    }

    public function updateBasicInfo() {

        $data = array(
            "app_name" => request()->app_name,
            "home_page_title" => request()->home_page_title,
        );

        Cache::put('basic_info_cache', json_encode($data));
        Cache::put('active_tab', 'basic_info');

        return redirect()->back()->with('success', 'Data was saved successfully.');
    }

    public function updateContactAndFooter() {

        $data = array(
            "address" => request()->address,
            "phone_number" => request()->phone_number,
            "email" => request()->email,
        );

        Cache::put('contact_and_footer_cache', json_encode($data));
        Cache::put('active_tab', 'contact');

        return redirect()->back()->with('success', 'Data was saved successfully.');
    }

    public function updateLogo() { 
        $img_path = "";
        if(request()->hasFile('image')){
            $root = 'assets/';       
            $folder_to_save = 'logo';
            $image_name = uniqid() . "." . request()->image->extension();
            request()->image->move(public_path($root . $folder_to_save), $image_name);
            $img_path = $root . $folder_to_save . "/" . $image_name;
            Cache::put('logo_cache', $img_path);
        }
        Cache::put('active_tab', 'logo');

        return redirect()->back()->with('success', 'Data was saved successfully.');
    }
}
