<?php

namespace App\Http\Controllers;

use App\FrontUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {
    /**
    * Create a new controller instance.
    *
    * @return void
    */

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function index() {

        $data = [
            'title' => 'Course Managemant System'
        ];

        $data = ( object ) $data;

        return view( 'frontend.index', compact( 'data' ) );
    }

    public function FrontLogin( Request $request ) {

        $request->validate( [
            'username' => 'required',
            'password' => 'required'
        ] );

        $username       = $request->username;
        $form_password  = md5( $request->password );

        $user = FrontUser::where( [
            ['username', $username],
        ] )->first();

        if ( $user == null ) {
            $request->session()->flash( 'usernotfound', 'User not found' );
            return back();
        }

        if ( $form_password != $user->password ) {
            $request->session()->flash( 'Passwordnotmatching', 'Password does not match' );
            return back();
        }

        if ( $user->status != 1 ) {
            $request->session()->flash( 'usernotactive', 'Please contact Admin to activate your account' );
            return back();
        }

        $request->session()->put('front_user', $user->username);
        return redirect('/student-dashboard');
    }

    public function Frontlogout() {

        Session::forget('front_user');
        return redirect( '/' );
    }
}
