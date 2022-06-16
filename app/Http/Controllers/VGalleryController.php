<?php

namespace App\Http\Controllers;

use App\VGallery;
use App\GalleryVideos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       if(!check(11,1, session('permissions'))){
 
            return abort(404);
        } 

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'معرض الفيديو';
            
        } else {

            $title = 'Video Gallery';
        }


        $vgallery = VGallery::paginate(10);

        $count = VGallery::count();

        $data = [
            'title'     => $title,
            'vgallerys' => $vgallery,
            'count'     => $count
        ];

        $data = (object) $data;

        return view('dashboard.vgallery_list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery = new VGallery();
        $gallery->name = $request->name;
        $gallery->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vgallery = VGallery::findorFail($id);
        $videos = $vgallery->videos()->paginate(10);

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'صالة عرض';
            
        } else {

            $title = 'Gallery';
        }

        $data = [
            'title' => $title . $vgallery->name ,
            'vgallery' => $vgallery,
            'videos' => $videos
        ];

        $data = (object) $data;

        return view('dashboard.videos_list', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    // public function edit(Gallery $gallery)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Gallery $gallery)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(VGallery $vgallery)
    {
        // dd($vgallery);
        $vgallery->delete();
        return back();
    }
}
