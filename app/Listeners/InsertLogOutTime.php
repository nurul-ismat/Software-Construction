<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\LogHistory;
use App\Events\UserLogout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InsertLogOutTime {
    /**
    * Create the event listener.
    *
    * @return void
    */

    public function __construct() {
        //
    }

    /**
    * Handle the event.
    *
    * @param  UserLogout  $event
    * @return void
    */

    public function handle( UserLogout $event ) {
        $log_id = session()->get( 'session_log_id' );

        if ( isset( $log_id ) && !empty( $log_id ) ) {
            $log = LogHistory::find( $log_id );
            if ( !$log == null ) {
                $log->logout_time = Carbon::now()->timestamp;
                $log->save();
            }
        }
    }
}
