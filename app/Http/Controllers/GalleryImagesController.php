<?php

namespace App\Http\Controllers;

use App\GalleryImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryImagesController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    // public function index( $id ) {

    // }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    // public function create() {
    //     //
    // }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {

        if(!check(10,2, session('permissions'))){
 
            return abort(404);
        }

        $request->validate( [
            'image' => 'required|image|max:2048'
        ] );

        $image = new GalleryImages();

        if ( isset( $request->title ) && !empty( $request->title ) ) {
            $image->title = $request->title;
        } else {
            $image->title = $request->image->getClientOriginalName();
        }

        $image->description = $request->description;
        $image->gallery_id = $request->gallery_id;



        if ( $request->hasfile( 'image' ) ) {
            $path = $request->file( 'image' )->store( '/public/imagegallery/image' );
            $path = explode( '/', $path );
            $path = end( $path );
            $image->image = $path;
        }

        $image->save();

        return back();

    }

    /**
    * Display the specified resource.
    *
    * @param  \App\GalleryImages  $galleryImages
    * @return \Illuminate\Http\Response
    */

    // public function show( GalleryImages $galleryImages ) {
    //     //
    // }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\GalleryImages  $galleryImages
    * @return \Illuminate\Http\Response
    */

    // public function edit( GalleryImages $galleryImages ) {
    //     //
    // }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\GalleryImages  $galleryImages
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {

        $request->validate( [
            'image' => 'image|max:2048'
        ] );

        $galleryImages = galleryImages::find( $id );
        $galleryImages->title = $request->title;
        $galleryImages->description = $request->description;

        if ( $request->hasfile( 'image' ) ) {

            if ( isset( $galleryImages->image ) && !empty( $galleryImages->image ) ) {
                $image = public_path( 'storage/imagegallery/image/' . $galleryImages->image );
                if ( File::exists( $image ) ) {
                    unlink( $image );
                }
            }

            $path = $request->file( 'image' )->store( '/public/imagegallery/image' );
            $path = explode( '/', $path );
            $path = end( $path );

            $galleryImages->image = $path;
        }

        $galleryImages->save();

        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\GalleryImages  $galleryImages
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {

        $image = GalleryImages::find( $id );
        $image->delete();

        if ( isset( $image->image ) && !empty( $image->image ) ) {

            // delete user image
            $image = public_path( '/storage/imagegallery/image/' . $image->image );
            if ( File::exists( $image ) ) {
                unlink( $image );
            }

        }

        return back();
    }

    public function dzone( Request $request ) {

        $request->validate( [
            'file' => 'required|image|max:2048'
        ] );

        $path = $request->file( 'file' )->store( '/public/imagegallery/image' );
        $path = explode( '/', $path );
        $path = end( $path );

        $image = new GalleryImages();

        $image->gallery_id = $request->gallery_id;
        $image->title = $request->file->getClientOriginalName();
        $image->image = $path;

        $image->save();

        return response()->json(['success'=>$path]);

    }

    public function updateorder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));
            
            foreach($arr as $sortOrder => $id){
                $image = GalleryImages::find($id);
                $image->position = $sortOrder;
                $image->save();
            }
            return response()->json(['success'=>true,'message'=>'Updated']);
        }
    }
}
