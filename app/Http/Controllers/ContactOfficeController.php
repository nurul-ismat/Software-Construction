<?php

namespace App\Http\Controllers;

use App\ContactOffice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactOfficeController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {

        $offices = ContactOffice::paginate( 10 );

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'مكاتب';

        } else {

            $title = 'Offices';
        }

        $data = [
            'title' => $title,
            'offices' => $offices
        ];

        $data = ( object )$data;

        return view( 'dashboard.offices', compact( 'data' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $request->validate( [
            'name' => 'required',
            'long' => 'required|numeric',
            'lat' => 'required|numeric'
        ] );

        $office = new ContactOffice();

        $office->name = $request->name;
        $office->long = $request->long;
        $office->lat = $request->lat;

        $office->save();

        return back();
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\ContactOffice  $contactOffice
    * @return \Illuminate\Http\Response
    */

    public function show( ContactOffice $contactOffice ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\ContactOffice  $contactOffice
    * @return \Illuminate\Http\Response
    */

    public function edit( ContactOffice $contactOffice ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\ContactOffice  $contactOffice
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $request->validate( [
            'name' => 'required',
            'long' => 'required|numeric',
            'lat' => 'required|numeric'
        ] );

        $office = ContactOffice::find($id);

        $office->name = $request->name;
        $office->long = $request->long;
        $office->lat = $request->lat;

        $office->save();

        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\ContactOffice  $contactOffice
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {

        ContactOffice::find($id)->delete();
        
        return back();
    }
}
