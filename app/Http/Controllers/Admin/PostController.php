<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\Post;
use Cache;
use Utils;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function events_view(GeneralSetting $setting) { 
        $page_title = "Events | " . $setting::getAppName();
        $posts = Post::where('category', 'event')->paginate(10);
        $category = 'event';
        $post_text = "Event";
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
        $img_path = Utils::imageUpdoad($request);
        $inputs = $request->all();
        if ($img_path) {
            $inputs['image'] = $img_path;
        }
        Post::create($inputs);
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
        $img_path = Utils::imageUpdoad($request);
        $inputs = $request->except('_token');
        if ($img_path) {
            $inputs['image'] = $img_path;
        }
        Post::where('id', $id)->update($inputs);
        return redirect()->back()->with('success', $request->category.' was update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
