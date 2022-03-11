<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\Downloads;
use Cache;
use Utils;

class DownloadsController extends Controller
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
    public function index(GeneralSetting $setting) { 
        $page_title = "Manage Downloads | " . $setting::getAppName();
        $downloads = Downloads::paginate(10);
        $contact = json_decode(Cache::get('contact_and_footer_cache'));
        return view('admin.downloads.index', compact('page_title', 'setting', 'downloads'));
    }

    public function downloads_view(GeneralSetting $setting) { 
        $page_title = "Manage Downloads | " . $setting::getAppName();

        $downloads = Downloads::all();

        $contact = json_decode(Cache::get('contact_and_footer_cache'));

        return view('downloads', compact('page_title', 'setting', 'downloads'));
    }

    public function downloadFile($file_name)
    {
    	$file_path = public_path('downloads/' . $file_name);

    	return response()->download($file_path);
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
        $file_name = uniqid() . $request->image->getClientOriginalName();
        $file_path = Utils::fileUpdoad($request, '', 'downloads', $file_name);
        $inputs = $request->all();
  
        if ($file_path) {
            $inputs['file'] = $file_path;
        }
        Downloads::create($inputs);
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
        $file_name = $request->image ? uniqid() . "_" . $request->image->getClientOriginalName() : uniqid();
        $file_path = Utils::fileUpdoad($request, '', 'downloads', $file_name);
        $inputs = $request->except('_token', 'image');
   
        if ($file_path) {
            $inputs['file'] = $file_path;
        }
        Downloads::where('id', $id)->update($inputs);
        return redirect()->back()->with('success', 'Data was update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Downloads $download)
    {
        if ($download->delete()) {
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
