<?php

namespace App\Http\Middleware;

use Closure;
use App\ContactSetting;

class ContactSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $contact_info = ContactSetting::find( 1 );

        $request->session()->put('contact_info', $contact_info);
        
        return $next($request);
    }
}
