<?php

namespace App\Http\Controllers;

use App\LogHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogHistoryController extends Controller
{
    public function index(){

    	if(!check(4,1, session('permissions'))){
 
            return abort(404);
        }

        $logs = LogHistory::with('getuser')->paginate(10);

        if (Session::get( 'locale' ) == 'ar' ) {

            $title = 'سجلات المستخدم';

        } else {

            $title = 'User Logs';
        }

        $data = [
            'title' => $title,
            'logs' => $logs
        ];

        $data = (object) $data;

        return view('dashboard.log_history', compact('data'));
    }
}
