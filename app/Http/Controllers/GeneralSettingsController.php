<?php

namespace App\Http\Controllers;

use App\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class GeneralSettingsController extends Controller
{
    public function view(){

        if(!check(5,1, session('permissions'))){
 
            return abort(404);
        }

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'الاعدادات العامة';

        } else {

            $title = 'General Settings';
        }

        $gsettings = GeneralSettings::findOrFail(1);

        $data =[
            'title' => $title,
            'gsettings' => $gsettings
        ];

        $data = (object)$data;

        return view('dashboard.general_settings', compact('data'));
    }

    public function update(Request $request){

        $request->validate([
            'site_name' => 'required|min:3',
            'site_title' => 'required|min:3',
            'footer_text' => 'required|min:3',
            'footer_text-ar' => 'required|min:3',
            'site_logo' => 'image|max:2048',
        ]);


        $gsettings = GeneralSettings::findOrFail(1);
        $gsettings->site_name = $request->site_name;
        $gsettings->site_title = $request->site_title;
        $gsettings->footer_text = $request->footer_text;
        $gsettings->footer_text_ar = $request->footer_text_ar;

        if($request->hasfile('site_logo')){

            if(isset($gsettings->site_logo) && !empty($gsettings->site_logo)){
                // delete old image
                $image = public_path('storage/site/' . $gsettings->site_logo);
                if(File::exists($image)){
                    unlink( $image );
                }
            }

            // upload new image
            $path = $request->file('site_logo')->store('/public/site');
            $path = explode('/', $path);
            $path = end($path);
            $gsettings->site_logo = $path;
        }

        $gsettings->save();


        return back();
    }

}
