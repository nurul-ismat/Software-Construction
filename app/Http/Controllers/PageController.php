<?php

namespace App\Http\Controllers;

use App\Page;
use App\Pagecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!check(8,1, session('permissions'))){

            return abort(404);
        }

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'قائمة الصفحات';

        } else {

            $title = 'Page List';
        }

        $count  = Page::count();

        $pages = Page::all();

         $data =[
            'title' => $title,
            'pages' => $pages,
            'count' => $count
        ];

        $data = (object)$data;

        return view('dashboard.all_pages_list', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check(8,2, session('permissions'))){

            return abort(404);
        }

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'صفحة جديدة';

        } else {

            $title = 'New Page';
        }

          $category = Pagecategory::all();

          $data =[
            'title'     => $title,
            'category'  => $category,
        ];

        $data = (object)$data;

        return view('dashboard.add_new_pages', compact(['data']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[

            'page_name' => 'required',
            'slug'      => 'unique:pages',
            // 'category'  => 'required',
            'language'  => 'required',
            'editor1'   => 'required',
            'status'    => 'required'
       ]);

       $page    = new Page();

            $page->page_name        = $request->page_name;
            $page->slug             = $request->slug;
            $page->category_id      = $request->category;
            $page->language         = $request->language;
            $page->page_content     = $request->editor1;
            $page->feature_image    = $request->image;
            $page->status           = $request->status;


            if ( $request->hasfile( 'image' ) ) {
                $path = $request->file( 'image' )->store( '/public/pageimage/' );
                $path = explode( '/', $path );
                $path = end( $path );
                $page->feature_image = $path;
            }

            $page->save();

            return redirect()->route('page.index')->with('success',
            'Pages Data is Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages      = Page::findOrFail($id);
        $category   = Pagecategory::all();

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'تحرير الصفحة';

        } else {

            $title = 'Page Edit';
        }

         $data =[
            'title'     => $title,
            'pages'     => $pages,
            'category'  => $category,
        ];

        $data = (object)$data;

        return view('dashboard.edit_pages', compact(['data']));
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
         $this->validate($request,[

            'page_name' => 'required',
            'slug'      => 'unique:pages,slug,'.$id,
            // 'category'  => 'required',
            'language'  => 'required',
            'editor1'   => 'required',
            'status'    => 'required'
       ]);

            $page                   = Page::findOrFail($id);
            $page->page_name        = $request->page_name;
            $page->slug             = $request->slug;
            $page->category_id      = $request->category;
            $page->language         = $request->language;
            $page->page_content     = $request->editor1;
            // $page->feature_image    = $request->image;
            $page->status           = $request->status;


            if ( $request->hasfile( 'image' ) ) {

                if(isset($page->feature_image) && !empty($page->feature_image)){
                $image = public_path('storage/pageimage/'.$page->feature_image);


                if(File::exists($image)){
                    Storage::delete('/public/pageimage/'.$page->feature_image);
                    }
                }

                $path = $request->file( 'image' )->store( '/public/pageimage/' );
                $path = explode( '/', $path );
                $path = end( $path );
                $page->feature_image = $path;
            }

            $page->save();

            return redirect()->route('page.index')->with('success',
            'Pages Data is Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete user
        $page = Page::findOrFail($id);
        $page->delete();

        if(isset($page->feature_image) && !empty($page->feature_image)){
            // delete user image
            $image = public_path('storage/pageimage/'.$page->feature_image);
            //dd($image);
            if(File::exists($image)){
                unlink( $image );
            }
        }

        return back();
    }
}

?>
