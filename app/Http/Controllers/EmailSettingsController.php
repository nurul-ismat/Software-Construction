<?php

namespace App\Http\Controllers;

use App\EmailSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmailSettingsController extends Controller
{
    public function view(){

        if(!check(7,1, session('permissions'))){
 
            return abort(404);
        }

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'إعدادات البريد الإلكتروني';

        } else {

            $title = 'Email Settings';
        }

        $esettings = EmailSettings::find(1);
        $data =[
            'title' => $title,
            'esettings' => $esettings,
        ];

        $data = (object)$data;

        return view('dashboard.email_settings', compact('data'));
    }

    public function update(Request $request){

        $email = EmailSettings::findorFail(1);
        $email->mail_drivers = $request->mail_drivers;
        $email->mail_host = $request->mail_host;
        $email->mail_port = $request->mail_port;
        $email->user_name = $request->user_name;
        $email->password = $request->password;
        $email->mail_encryption = $request->mail_encryption;
        $email->mail_address = $request->mail_address;
        $email->mail_from_name = $request->mail_from_name;
        $email->save();

        return back();

    }
}
