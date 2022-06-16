<?php

namespace App\Http\Controllers;

use App\ShowReq;
use App\Properties;
use App\EnquirySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShowReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->group->id < 4){
            $reqs = Properties::with('showreq')->paginate(10);
        }else {
            $reqs = Auth::user()->properties()->with('showreq')->paginate(10);
        }

         if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'طلب عرض الممتلكات';
            
        } else {

            $title = 'Property Show Request';
        }

        $count      = ShowReq::count();
        $active     = ShowReq::where('status','=','1')->count();
        $inactive   = ShowReq::where('status','=','0')->count();

        $data= [
            'title'     => $title,
            'reqs'      => $reqs,
            'count'     => $count,
            'active'    => $active,
            'inactive'  => $inactive
        ];

        $data = (object) $data;

        return view('dashboard.showreq_list', compact('data'));

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
            'phone' => 'required',
            'comment' => 'required',
            'property_id' => 'required',
        ]);


        $show = new Showreq();

        $show->status = 0;
        $show->property_id = $request->property_id;
        $show->client_name = $request->name;
        $show->client_email = $request->email;
        $show->client_phone = $request->phone;
        $show->request = $request->comment;

        $show->save();

        // get property details

        $property = Properties::find($request->property_id);

        // send mail start

        $to_mail = EnquirySetting::find(1);
        $to_mail = $to_mail->email;

        $details = [
            'p_title' => $property->title,
            'p_owner_name' => $property->owner_name,
            'p_city' => $property->city,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->phone,
            'message' => $request->comment,
        ];

        \Mail::to($to_mail)->send(new \App\Mail\ShowReqmail($details));

        // send mail end


        return back()->with('enqiuiry_success', "You enquery has been successfully submitted");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShowReq  $showReq
     * @return \Illuminate\Http\Response
     */
    public function show(ShowReq $showReq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShowReq  $showReq
     * @return \Illuminate\Http\Response
     */
    public function edit(ShowReq $showReq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShowReq  $showReq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShowReq $showReq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShowReq  $showReq
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShowReq $showReq)
    {
        //
    }

    public function showreqstatus($id){

        $req = Showreq::findorFail($id);

        $req->ToogleStatus();

        return back();

    }
}
