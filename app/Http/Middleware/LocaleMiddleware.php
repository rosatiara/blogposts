<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocaleMiddleware
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
        // intercept local settings before the request is processed by the controllers

        // if locale null, fallback_locale. else, get locale.
        $locale = Session::get('locale')===null?config('app.fallback_locale'):Session::get('locale');
        if ($request->has('locale')){
            $locale = $request->get('locale');
            Session::put('locale', $locale);
        }
        App::setLocale($locale);
        return $next($request);
    }
}
