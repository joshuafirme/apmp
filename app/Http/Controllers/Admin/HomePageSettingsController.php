<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\SliderBanner;
use App\Models\Slider;
use App\Models\User;
use Cache;

class HomePageSettingsController extends Controller
{
    private $page = "Manage Site";

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (User::isPermitted($this->page)) { return $next($request); }
            return abort(401);
        });
    }

    public function index(GeneralSetting $setting) { 
        $page_title = "Home Page Settings | " . $setting::getAppName();

        $slider_banner = SliderBanner::paginate(5);
        $slider = Slider::paginate(5);

        return view('admin.homepage-settings.index', compact('page_title', 'setting', 'slider_banner', 'slider'));
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

    public function updateHeader() {
        $data = array(
            "title" => request()->title,
            "projects" => request()->projects,
            "events" => request()->events,
            "news" => request()->news,
            "about" => request()->about,
            "advocacies" => request()->advocacies,
            "contact" => request()->contact,
            "gallery" => request()->gallery,
            "blog" => request()->blog,
        );

        Cache::put('header_cache', json_encode($data));
        Cache::put('hp_active_tab', 'header');

        return redirect()->back()->with('success', 'Data was saved successfully.');
    }
}
