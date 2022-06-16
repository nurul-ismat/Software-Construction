<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\GalleryImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check(12,2, session('permissions'))){
 
            return abort(404);
        }

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'المعارض';;
            
        } else {

            $title = 'Galleries';
        }

        $gallery = Gallery::paginate(10);

        $count = Gallery::count();

        $data = [

            'title'     => $title,
            'gallerys'  => $gallery,
            'count'     => $count
        ];

        $data = (object) $data;

        return view('dashboard.gallery_list', compact('data'));
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
        $gallery = new Gallery();
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
        if(!check(10,1, session('permissions'))){
 
            return abort(404);
        }

        $gallery = Gallery::findorFail($id);
        $images = $gallery->images()->paginate(10);

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'اصالة عرض';
            
        } else {

            $title = 'Gallery';
        }


        $data = [
            'title' => $title. $gallery->name ,
            'gallery' => $gallery,
            'images' => $images
        ];

        $data = (object) $data;

        return view('dashboard.images_list', compact('data'));
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
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return back();
    }
}
