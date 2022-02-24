<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Cache;
use Utils;

class DashboardController extends Controller
{
    public function index() {
        $page_title = "Dashboard | " . Utils::getAppName();
        return view('admin.dashboard', compact('page_title'));
    }
}
