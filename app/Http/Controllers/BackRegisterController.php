<?php

namespace App\Http\Controllers;

use App\User;
use App\UserSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BackRegisterController extends Controller
{

    public function register_view(){


        $data =[
            'title' => 'Register'
        ];

        $data = (object)$data;

        return view('auth.register', compact('data'));
    }



    public function register(Request $request){

        $request->validate([
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'uname' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:password_confirmation',
            'password_confirmation' => 'required',
        ]);

            // default user settings data
            $usettings = UserSettings::find(1);

            $user = new User();
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->uname = $request->uname;
            $user->email = $request->email;
            $user->user_group = $usettings->new_user_group;
            $user->status = $usettings->new_user_status;
            $user->is_front = 0;
            $user->password = md5($request->password);
            $user->save();

            $uid = $user->id;

            if($usettings->new_user_status == 1){
                auth()->login($user);
                return redirect('/utm-admin');
            }else{
                // flash message here
                $request->session()->flash('usernotactive', 'Please contact Admin to activate your account');
                return back();
            }

    }


}
