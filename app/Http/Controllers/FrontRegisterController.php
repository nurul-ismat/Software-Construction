<?php

namespace App\Http\Controllers;

use App\FrontUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FrontRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = [
            'title' => 'signup',
        ];

        $data = ( object ) $data;

        return view('frontend.signup', compact( 'data' ) );

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
            'username' => 'required|min:3|unique:front_users',
            'password' => 'required|min:6|same:con_pass',
            'con_pass' => 'required',
        ]);

        $front_user = new FrontUser();

        $front_user->username = $request->username;
        $front_user->password  = md5($request->password);
        $front_user->status    = 1;

        $front_user->save();

        $request->session()->put('front_user', $front_user->username);
        
        if($front_user->status == 1){
            return redirect('/student-dashboard');
        }else{
            // flash message here
            $request->session()->flash('usernotactive', 'Please contact Admin to activate your account');
            return back();
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
