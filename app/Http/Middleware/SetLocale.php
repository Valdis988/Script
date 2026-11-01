<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    private const DEFAULT_LOCALE = 'uk';

    public function handle(Request $request, Closure $next): Response
    {
        $supported = array_keys(config('locales'));
        $aliases   = ['ua' => 'uk']; // ?lang=ua → uk

        if ($request->has('lang')) {
            $lang = $request->query('lang');
            $lang = is_string($lang) ? ($aliases[$lang] ?? $lang) : null;


            $locale = in_array($lang, $supported, true)
                ? $lang
                : self::DEFAULT_LOCALE;

            $request->session()->put('locale', $locale);
        } else {
            $locale = $request->session()->get('locale', self::DEFAULT_LOCALE);

            if (! in_array($locale, $supported, true)) {
                $locale = self::DEFAULT_LOCALE;
            }
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
