<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\GeneralSetting;
use App\Models\SliderBanner;
use App\Models\Slider;
use Utils;

class LandingPageController extends Controller
{
    public function index(GeneralSetting $setting) {
        $slider_banner = SliderBanner::get();
        $slider = Slider::get();
        $page_title = $setting::getHomePageTitle();
        return view('index', compact('page_title', 'slider_banner', 'slider'));
    }
}
