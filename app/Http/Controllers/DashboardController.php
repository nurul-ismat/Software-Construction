<?php

namespace App\Http\Controllers;

use App\ShowReq;
use App\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller {
    public function index() {

        $requested = Properties::where( 'status', 0 )->get()->count();
        $published = Properties::where( 'status', 1 )->get()->count();

        $srequested = ShowReq::where( 'status', 0 )->get()->count();
        $spublished = ShowReq::where( 'status', 1 )->get()->count();

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'لوحة القيادة';
            
        } else {

            $title = 'Dashboard';
        }

        $data = [

            'title' => $title,

            'property' => [
                'published' => $published,
                'requested' => $requested
            ],

            'showreq' => [
                'published' => $spublished,
                'requested' => $srequested
            ],

        ];

        $data = ( object )$data;

        return view( 'dashboard.dashboard', compact( 'data' ) );
    }
}
