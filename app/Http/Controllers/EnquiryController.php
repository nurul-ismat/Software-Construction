<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\EnquirySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enq = Enquiry::paginate(10);

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'استفسارات';
            
        } else {

            $title = 'Enqueries';
        }

        $data = [
            'title' => $title,
            'enqueries' => $enq
        ];

        $data = (object)$data;

        return view('dashboard.enquery_list', compact('data'));
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

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $e = new Enquiry();

        $e->name = $request->name;
        $e->email = $request->email;
        $e->mobile = $request->mobile;
        $e->subject = $request->subject;
        $e->message = $request->message;

        $e->save();

        $to_mail = EnquirySetting::find(1);
        $to_mail = $to_mail->email;

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'subject' => $request->subject,
            'message'  => $request->message
        ];

        \Mail::to($to_mail)->send(new \App\Mail\enquirymail($details));

        return back()->with('enqiuiry_success', "You enquery has been successfully submitted");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        //
    }


    public function settings(){

        $en_mail = EnquirySetting::find(1);
        $en_mail = $en_mail->email;


        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'إعدادات التحقيق';
            
        } else {

            $title = 'Enquery Settings';
        }

        $data = [
            'title' => $title,
            'email' => $en_mail
        ];

        $data = (object) $data;

        return view('dashboard.enquery_settings', compact('data'));
    }

    public function settingsup(Request $request){

        $request->validate([
            'email' => 'required|email'
        ]);

        $en_mail = EnquirySetting::find(1);

        $en_mail->email = $request->email;

        $en_mail->save();

        return back()->with('ensettingsuccess', 'Successfully Updated!');

    }



}
