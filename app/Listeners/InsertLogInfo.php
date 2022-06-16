<?php

namespace App\Listeners;

use Browser;
use session;
use Carbon\Carbon;
use App\LogHistory;
use App\Events\UserLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InsertLogInfo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLogin  $event
     * @return void
     */
    public function handle(UserLogin $event)
    {
        $user = Auth::user();

        $log = new LogHistory();
        $log->user_id = $user->id;
        $log->login_time = Carbon::now()->timestamp;
        $log->browser = Browser::browserName();
        $log->os = Browser::platformName();
        $log->ip_address = \Request::getClientIp(true);
        $log->save();

        session()->put('session_log_id', $log->id);

        return $event;
    }
}
