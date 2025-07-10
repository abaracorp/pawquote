<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmptyPostData
{
    public function handle($request, Closure $next)
    {
                if ($request->isMethod('post') && empty($request->all()) && $request->header('Content-Length') > 0) {
                   session()->flash('error', 'Upload failed. One or more files are too large (max 10MB each).');

                //    dd(session()->all());
                    return redirect()->back();
                }

        return $next($request);
    }
}

