<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontNotificationController extends Controller
{
     public function index()
    {

        $data = [
            'title'     => 'Notification',
        ];

        $data = ( object ) $data;

        return view('frontend.all-notification', compact('data'));
    }
}
