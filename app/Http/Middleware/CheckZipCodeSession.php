<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckZipCodeSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('zip_code')) {
            return redirect()->route('getQuote');
        }

        return $next($request);
    }
}
