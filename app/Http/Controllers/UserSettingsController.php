<?php

namespace App\Http\Controllers;

use App\Group;
use App\UserSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserSettingsController extends Controller
{
    public function view(){

        if(!check(6,1, session('permissions'))){
 
            return abort(404);
        }

        $usettings = UserSettings::findOrFail(1);
        $groups = Group::all();

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'إعدادات المستخدم';

        } else {

            $title = 'User Settings';
        }

        $data =[
            'title' => $title,
            'usettings' => $usettings,
            'groups' => $groups
        ];

        $data = (object)$data;

        return view('dashboard.user_settings', compact('data'));
    }

    public function update(Request $request){

        $usettings = UserSettings::findOrFail(1);
        $usettings->new_user_register = $request->new_user_register;
        $usettings->new_user_group = $request->new_user_group;
        $usettings->new_user_status = $request->new_user_status;
        $usettings->save();

        return back();

    }

}
