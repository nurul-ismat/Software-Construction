<?php

namespace App\Http\Controllers;

use App\ContactSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactSettingController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {

        if(!check(14,2, session('permissions')) || !check(14,3, session('permissions'))){
 
            return abort(404);
        }


        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'إعدادات الاتصال';

        } else {

            $title = 'Contact Settings';
        }

        $cs = ContactSetting::find( 1 );

        $data = [
            'title' => $title,
            'cs' => $cs
        ];

        $data = ( object )$data;

        return view( 'dashboard.contact_setting', compact( ['data'] ) );
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
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\ContactSetting  $contactSetting
    * @return \Illuminate\Http\Response
    */

    public function show( ContactSetting $contactSetting ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\ContactSetting  $contactSetting
    * @return \Illuminate\Http\Response
    */

    public function edit( ContactSetting $contactSetting ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\ContactSetting  $contactSetting
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {

        $request->validate([
            'email' => 'email',
        ]);

        
        $contact = ContactSetting::findorFail($id);
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->facebook = $request->facebook;
        $contact->twitter = $request->twitter;
        $contact->instagram = $request->instagram;
        $contact->linkedin = $request->linkedin;
        $contact->skype = $request->skype;
        $contact->youtube = $request->youtube;
        $contact->save();

        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\ContactSetting  $contactSetting
    * @return \Illuminate\Http\Response
    */

    public function destroy( ContactSetting $contactSetting ) {
        //
    }
}
