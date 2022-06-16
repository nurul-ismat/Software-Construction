<?php

namespace App\Http\Middleware;

use Closure;
use App\BackSlider;

class SliderMiddleware
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

        $sliders = BackSlider::where( 'is_active', 1 )->orderBy( 'position', 'asc' )->get();

        $sliders = (object) $sliders;

        $request->session()->put('sliders', $sliders);


        return $next($request);
    }
}
