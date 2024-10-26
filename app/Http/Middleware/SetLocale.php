<?php

// app/Http/Middleware/SetLocale.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('locale')) {
            session()->put('locale', 'de');
        }

        app()->setLocale(session('locale'));

        return $next($request);
    }
}
