<?php

namespace itsep\Http\Middleware;

use Closure;

class Setlocale
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
        app()->setLocale(\Session::get('locale'));
        return $next($request);
    }
}
