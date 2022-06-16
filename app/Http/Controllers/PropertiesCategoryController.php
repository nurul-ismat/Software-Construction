<?php

namespace App\Http\Controllers;

use App\Propertiescategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PropertiesCategoryController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {

        if ( !check( 17, 1, session( 'permissions' ) ) ) {

            return abort( 404 );
        }

        $categories = Propertiescategories::whereNull( 'category_id' )
        ->with( 'childrenCategories' )
        ->get();

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'خصائص الفئة';
            
        } else {

            $title = 'Properties Category';
        }

        $data = [
            'title'     => $title,
            'category'  => $categories,
        ];

        $data = ( object )$data;

        return view( 'dashboard.properties_category_list', compact( ['data'] ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {

    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $this->validate( $request, [

            'category' => 'required'
        ] );

        $category = new Propertiescategories ;

        $category->category_id          = $request->parent_id;
        $category->name                 = $request->category;

        $category->save();

        return redirect()->route( 'propertiescategory.index' )->with( 'success',
        'Pages Data is Added' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {

        $cat = Propertiescategories::find($id);
        $cat->name = $request->name;
        $cat->save();

        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {

        Propertiescategories::where( 'category_id', $id )->update( ['category_id' => 100000] );
        Propertiescategories::find( $id )->delete();

        return back();
    }
}
