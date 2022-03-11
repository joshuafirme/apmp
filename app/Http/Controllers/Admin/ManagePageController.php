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
   
        $file_path = Utils::fileUpdoad(request());
        $show_media = request()->show_media == 'on' ? 1 : 0;
        $old_cache = json_decode(Cache::get('about_cache'));

        if (isset($old_cache->media)) {
            Utils::removeFile($old_cache->media);
        }

        $data = array(
            "about_content" => request()->about_content,
            "media" => $file_path,
            "show_media" => $show_media
        );
        Cache::put('about_cache', json_encode($data));
        return redirect()->back()->with('success', 'Data was saved successfully.'); 
    }

    public function privacy_policy_view(GeneralSetting $setting) { 
        $page_title = "Privacy Policy | " . $setting::getAppName();
        return view('admin.manage-pages.privacy-policy.index', compact('page_title'));
    }

    public function privacy_policy_page_view(GeneralSetting $setting) { 

        $page_title = "Privacy Policy | " . $setting::getAppName();

        $contact = json_decode(Cache::get('contact_and_footer_cache'));

        return view('privacy-policy', compact('page_title', 'setting', 'contact'));
    }

    public function updatePrivacyPolicy() {
        Cache::put('privacy_policy_cache', request()->privacy_policy);
        return redirect()->back()->with('success', 'Data was saved successfully.'); 
    }
}
