<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\URL;

use Closure;
use Illuminate\Http\Request;

class Localize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(!in_array($request->loc,['tr','en'])){
            $base = url()->to('');
            $segments = $request->segments();
            $segments[0] ='';
            return redirect()->to($base.'/'.app()->getLocale().'/'.implode('/',$segments));
        }

        app()->setLocale($request->loc);

        return $next($request);
    }
}
