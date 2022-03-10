<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\GeneralSetting;
use App\Models\SliderBanner;
use App\Models\Slider;
use App\Models\Post;
use Utils;
use Cache;

class LandingPageController extends Controller
{
    public function index(GeneralSetting $setting) {

        $slider_banner = SliderBanner::get();

        $slider = Slider::get();
        
        $about = json_decode(Cache::get('about_cache'));

        $contact = json_decode(Cache::get('contact_and_footer_cache'));

        $projects = Post::where('category', 'project')->get();

        $events = Post::where('category', 'event')->get();

        $news = Post::where('category', 'news')->get();

        $page_title = $setting::getHomePageTitle();

        return view('index', compact('page_title', 'slider_banner', 'slider', 'about', 'contact', 'projects', 'events', 'news'));
    }

}
