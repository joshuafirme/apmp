<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Cache;
use Utils;
use App\Models\GeneralSetting;

class DashboardController extends Controller
{
    public function index(GeneralSetting $setting) {
        $page_title = "Dashboard | " . $setting::getAppName();
        return view('admin.dashboard', compact('page_title'));
    }
}
