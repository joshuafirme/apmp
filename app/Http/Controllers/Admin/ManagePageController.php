<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\User;
use Cache;
use Utils;

class ManagePageController extends Controller
{
    private $page = "Manage Pages";

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (User::isPermitted($this->page)) { return $next($request); }
            return abort(401);
        });
    }

    public function about_view(GeneralSetting $setting) { 
        $page_title = "About Page | " . $setting::getAppName();
        return view('admin.manage-pages.about.index', compact('page_title'));
    }

    public function updateAboutContent() { 

        $img_path = Utils::imageUpdoad(request());
        $show_image = request()->show_image == 'on' ? 1 : 0;
        
        $data = array(
            "about_content" => request()->about_content,
            "image" => $img_path,
            "show_image" => $show_image
        );
        Cache::put('about_cache', json_encode($data));
        return redirect()->back()->with('success', 'Data was saved successfully.'); 
    }
}
