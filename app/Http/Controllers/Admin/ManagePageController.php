<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\User;
use Cache;

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
        Cache::put('about_cache', request()->about_content);
        return redirect()->back()->with('success', 'Data was saved successfully.'); 
    }
}
