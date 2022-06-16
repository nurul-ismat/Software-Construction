<?php

namespace App\Http\Controllers;

use App\User;
use App\Events\UserLogin;
use App\Events\UserLogout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BackLoginController extends Controller {

    public function login_view() {
        $data = [
            'title' => 'Login'
        ];

        $data = ( object )$data;

        return view( 'auth.login', compact( 'data' ) );
    }

    public function login( Request $request ) {

        $request->validate( [
            'uname' => 'required',
            'password' => 'required'
        ] );

        $remember = isset( $request->remember )?true:false;

        $uname = $request->uname;
        $form_password = md5( $request->password );

        $user = User::where( [
            ['uname', $uname],
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

        if ( $user->is_front == 1 ) {
            return back( '/' );
        }

        Auth::login( $user, $remember );
        event( new UserLogin() );
        return redirect( '/utm-admin' );

    }

    public function logout() {
        Auth::logout();
        event( new UserLogout() );
        return redirect( '/utm-login' );
    }
}
