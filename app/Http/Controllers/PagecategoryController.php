<?php

namespace App\Http\Controllers;

use App\Pagecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PagecategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       if(!check(15,1, session('permissions'))){
 
            return abort(404);
        }

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'فئة الصفحة';
            
        } else {

            $title = 'Page Category';
        }

       $category = Pagecategory::all();

       $data =[

            'title'     => $title,
            'category'  => $category,
        ];

        $data = (object)$data;

        return view('dashboard.page_category', compact(['data']));
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

            'category' => 'required',
       ]);

        $category = new Pagecategory;

        $category->category = $request->category;

        $category->save();

        return redirect()->route('category.create')->with('success',
            'Pages Data is Added');
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

        $category   = Pagecategory::findOrFail($id);

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'تحرير فئة الصفحة';
            
        } else {

            $title = 'Page Category Edit';
        }

         $data =[

            'title'     => $title,
            'category'  => $category
        ];

        $data = (object)$data;

        return view('dashboard.edit_page_category', compact(['data']));
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

            'category'  => 'required',
       ]);

        $category = Pagecategory::findOrFail($id);
        $category->category = $request->category;
        $category->save();

        return redirect()->route('category.create')->with('success',
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
        $category = Pagecategory::findOrFail($id);
        $category->delete();

        return back();
    }
}
