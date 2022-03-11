<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\Blog;
use Cache;
use Utils;

class BlogController extends Controller
{
  /*  private $page = "Manage Site";

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (User::isPermitted($this->page)) { return $next($request); }
            return abort(401);
        });
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GeneralSetting $setting) { 
        $page_title = "Blog | " . $setting::getAppName();
        $blog = Blog::paginate(10);
        $contact = json_decode(Cache::get('contact_and_footer_cache'));
        return view('admin.blog.index', compact('page_title', 'setting', 'blog'));
    }

    public function blog_view(GeneralSetting $setting) { 

        $page_title = "Blog | " . $setting::getAppName();

        $contact = json_decode(Cache::get('contact_and_footer_cache'));

        $blog = Blog::paginate(5);

        return view('blog', compact('page_title', 'setting', 'blog', 'contact'));
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
        Blog::create($request->all());

        return redirect()->back()->with('success', 'Data was saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function read($id, GeneralSetting $setting)
    {
        $blog = Blog::where('id', $id)->first();

        $page_title = $blog->title . " | " . $setting::getAppName();

        $contact = json_decode(Cache::get('contact_and_footer_cache'));


        return view('blog-read', compact('page_title', 'setting', 'blog', 'contact'));
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
        Blog::where('id',$id)->update($request->except('_token'));

        return redirect()->back()->with('success', 'Data was updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if ($blog->delete()) {
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
