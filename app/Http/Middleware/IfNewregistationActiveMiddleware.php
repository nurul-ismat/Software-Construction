<?php

namespace App\Http\Middleware;

use Closure;

class IfNewregistationActiveMiddleware
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
        $settings = Session()->get('settings');
        $register = $settings->user_settings->new_user_register;
        if($register != 1){
            return redirect('/');
        }
        return $next($request);
    }
}
