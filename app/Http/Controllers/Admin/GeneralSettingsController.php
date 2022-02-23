<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    public function index() {
        $page_title = "General Settings | Pamilya Muna Party List";
        return view('admin.general-settings.index', compact('page_title'));
    }
}
