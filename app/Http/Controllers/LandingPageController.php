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

        $projects = $this->getPostCache('project');

        $events = $this->getPostCache('event');

        $news = $this->getPostCache('news');

        $advocacies = $this->getPostCache('advocacy');

        $page_title = $setting::getHomePageTitle();

        return view('index', compact('page_title', 'slider_banner', 'slider', 'about', 'contact', 'projects', 'events', 'news', 'advocacies'));
    }

    public function getPostCache($category) {
        
        $post_cache = Cache::get('posts_cache');
        if ($post_cache) {
            return $post_cache;
        }
        $fresh_data = Post::where('category', $category)->get();
        Cache::get($category . '_cache', $fresh_data);
        return $fresh_data;
    }

}
