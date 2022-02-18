<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index() {
        $page_title = "Dashboard | Pamilya Muna Party List";
        return view('admin.dashboard', compact('page_title'));
    }
}
