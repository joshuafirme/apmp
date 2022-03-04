<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderBanner;
use Cache;
use Utils;

class SliderBannerController extends Controller
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
        SliderBanner::create($inputs);
        Cache::put('hp_active_tab', 'slider_banner');
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
        $img_path = Utils::imageUpdoad($request);
        $inputs = $request->except('_token');
        if ($img_path) {
            $inputs['image'] = $img_path;
        }
        SliderBanner::where('id', $id)->update($inputs);
        Cache::put('hp_active_tab', 'slider_banner');
        return redirect()->back()->with('success', 'Data was successfully update.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SliderBanner $slider)
    {
        if ($slider->delete()) {
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
