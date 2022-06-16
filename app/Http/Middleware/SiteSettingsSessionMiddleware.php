<?php

namespace App\Http\Middleware;

use Closure;
use App\UserSettings;
use App\EmailSettings;
use App\ContactSetting;
use App\GeneralSettings;

class SiteSettingsSessionMiddleware {
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */

    public function handle( $request, Closure $next ) {
        $general_settings = GeneralSettings::find( 1 );
        $email_settings = EmailSettings::find( 1 );
        $user_settings = UserSettings::find( 1 );
        $contact_settings = ContactSetting::find( 1 );

        $settings = [
            'general_settings' => $general_settings,
            'email_settings' => $email_settings,
            'user_settings' => $user_settings,
            'contact_settings' => $contact_settings
        ];

        $settings = ( object ) $settings;

        $request->session()->put( 'settings', $settings );

        return $next( $request );
    }
}
