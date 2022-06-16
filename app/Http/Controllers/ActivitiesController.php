<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ActivitiesController extends Controller {
	
    public function index() {

        if ( Session::has( 'locale') &&  Session::get( 'locale' ) == 'ar' ) {
            $content = Page::where( 'slug', 'about-us-ar' )->get()->first();
        } else {
            $content = Page::where( 'slug', 'about-us' )->get()->first();
        }

        $data = [
            'title' => $content->page_name,
            'content' => $content
        ];

        $data = ( object ) $data;

        return view( 'frontend.activities', compact( 'data' ) );
    }
}
