<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\Post;
use App\Models\User;
use Cache;
use Utils;

class PostController extends Controller
{
    private $page = "Manage Pages";

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (User::isPermitted($this->page)) { return $next($request); }
            return abort(401);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function advocacies_view(GeneralSetting $setting) { 
        $page_title = "Advocacies | " . $setting::getAppName();
        $posts = Post::where('category', 'advocacy')->paginate(10);
        $category = 'advocacy';
        $post_text = "Advocacies";
        return view('admin.manage-pages.post.index', compact('page_title', 'posts', 'category', 'post_text'));
    }

    public function events_view(GeneralSetting $setting) { 
        $page_title = "Events | " . $setting::getAppName();
        $posts = Post::where('category', 'event')->paginate(10);
        $category = 'event';
        $post_text = "Event";
        return view('admin.manage-pages.post.index', compact('page_title', 'posts', 'category', 'post_text'));
    }

     public function projects_view(GeneralSetting $setting) { 
        $page_title = "Projects | " . $setting::getAppName();
        $posts = Post::where('category', 'project')->paginate(10);
        $category = 'project';
        $post_text = "Project";
        return view('admin.manage-pages.post.index', compact('page_title', 'posts', 'category', 'post_text'));
    }

    public function news_view(GeneralSetting $setting) { 
        $page_title = "News | " . $setting::getAppName();
        $posts = Post::where('category', 'news')->paginate(10);
        $category = 'news';
        $post_text = "News";
        return view('admin.manage-pages.post.index', compact('page_title', 'posts', 'category', 'post_text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img_path = Utils::fileUpdoad($request);
        $inputs = $request->all();
        if ($img_path) {
            $inputs['image'] = $img_path;
        }
        Post::create($inputs);
        Cache::forget($request->category . '_cache');
        return redirect()->back()->with('success', $request->category.' was saved successfully.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $img_path = Utils::fileUpdoad($request);
        $inputs = $request->except('_token');
        if ($img_path) {
            $inputs['image'] = $img_path;
        }
        Post::where('id', $id)->update($inputs);
        Cache::forget($request->category . '_cache');
        return redirect()->back()->with('success', $request->category.' was update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return response()->json([
                'status' =>  'success',
                'message' => 'Data was deleted.'
            ], 200);
        }

        return response()->json([
            'status' =>  'error',
            'message' => 'Deleting data failed.'
        ], 200);
    }
}
