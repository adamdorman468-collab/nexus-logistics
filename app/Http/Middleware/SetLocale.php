<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $supportedLocales = ['id', 'en'];
        $preferred = $request->query('lang');

        $session = $request->hasSession() ? $request->session() : null;

        if ($preferred && in_array($preferred, $supportedLocales, true)) {
            if ($session) {
                $session->put('app_locale', $preferred);
            }

            app()->setLocale($preferred);
        }

        $locale = $session?->get('app_locale', app()->getLocale()) ?? config('app.locale');

        if (! in_array($locale, $supportedLocales, true)) {
            $locale = config('app.fallback_locale', 'en');
        }

        app()->setLocale($locale);

        return $next($request);
    }
}

