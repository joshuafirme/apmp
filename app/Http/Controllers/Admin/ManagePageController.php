<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Cache;

class ManagePageController extends Controller
{
    public function about_view(GeneralSetting $setting) { 
        $page_title = "About Page | " . $setting::getAppName();
        return view('admin.manage-pages.about.index', compact('page_title'));
    }

    public function updateAboutContent() { 
        Cache::put('about_cache', request()->about_content);
        return redirect()->back()->with('success', 'Data was saved successfully.'); 
    }
}
