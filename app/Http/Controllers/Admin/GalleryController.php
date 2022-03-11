<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\Gallery;
use App\Models\User;
use Cache;
use Utils;

class GalleryController extends Controller
{
    private $page = "Manage Site";

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
    public function index(GeneralSetting $setting, Gallery $gallery) { 
        $page_title = "Gallery | " . $setting::getAppName();
        $gallery = Gallery::paginate(10);

        $fb_photos_cache = Cache::get('fb_photos_cache');
        $gllr_settings = json_decode(Cache::get('gallery_settings_cache'));
        $limit = isset($gllr_settings->posts_limit) ? $gllr_settings->posts_limit : 10;
        $fb_photos = [];
        if ($fb_photos_cache) { 
            $fb_photos = $fb_photos_cache;
        }
        else {
            $this->getFreshFbPhotos();
        }
        $fb_photos = count($fb_photos) > 0 ? array_slice($fb_photos, 0, $limit) : [];
        return view('admin.gallery.index', compact('page_title', 'gallery', 'fb_photos', 'gllr_settings'));
    }

    public function gallery_view(GeneralSetting $setting) {

        $page_title = "Gallery | " . $setting::getAppName();

        $gallery = Gallery::paginate(10);

        $fb_photos_cache = Cache::get('fb_photos_cache');
        $fb_photos = [];
        if ($fb_photos_cache) { 
            $fb_photos = $fb_photos_cache;
        }
        else {
            $this->getFreshFbPhotos();
        }
        $gllr_settings = json_decode(Cache::get('gallery_settings_cache'));

        $contact = json_decode(Cache::get('contact_and_footer_cache'));

        return view('gallery', compact('page_title', 'setting', 'contact', 'gallery', 'fb_photos', 'gllr_settings'));
    }

    public function updateGallerySettings() {

        $use_fb_photos = request()->use_fb_photos == 'on' ? 1 : 0;
        $posts_limit = request()->posts_limit;
        $data = array(
            "use_fb_photos" => $use_fb_photos,
            "posts_limit" => $posts_limit
        );

        Cache::put('gallery_settings_cache', json_encode($data));

        return redirect()->back()->with('success', 'Setting was saved successfully.');
    }

    public function getFreshFbPhotos() {
        if (isset(request()->album_id)) {
        $album_id = request()->album_id;
        $gllr_settings = json_decode(Cache::get('gallery_settings_cache'));
        $limit = isset($gllr_settings->posts_limit) ? $gllr_settings->posts_limit : 10;
        $access_token = "EAAJhpWtJQJsBADNAyZCDZAZAlZCZBDFOSv6ZCPAsPy74S4QJM7lWQbs5gh8xkmn4IcPXipT7ZCfqTo3my9qtMNIupDjARnPqYuZCbptjEPTMmOLZAJCGivJboga1XGB6JFfyaj0IePQGZBVI06fQS74lbTFwpqZBtyAvJj3pYFwfDvJ0ZCYIeQz5hpZCdmZCdvcW9pcjvpVCbYpMPrugZDZD";
        $json_link = "https://graph.facebook.com/v2.3/{$album_id}/photos?limit={$limit}&fields=link,descriptio,source,images,name&access_token={$access_token}";
        $json = file_get_contents($json_link);
        
        $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
        $fb_photos = $obj['data'];
        Cache::put('fb_photos_cache', $fb_photos);
        }
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
    public function store(Request $request, Gallery $gallery)
    {
        $img_path = Utils::fileUpdoad($request);
        $inputs = $request->all();
        if ($img_path) {
            $inputs['image'] = $img_path;
        }
        Gallery::create($inputs);
        return redirect()->back()->with('success', 'Data was saved successfully.');
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
        Gallery::where('id', $id)->update($inputs);
        return redirect()->back()->with('success', 'Data was update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->delete()) {
            return response()->json([
                'status' =>  'success',
                'message' => 'gallery was deleted.'
            ], 200);
        }

        return response()->json([
            'status' =>  'error',
            'message' => 'Deleting gallery failed.'
        ], 200);
    }
}
