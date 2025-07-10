<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
     ->withMiddleware(function (Middleware $middleware) {
       $middleware->prepend(App\Http\Middleware\CheckEmptyPostData::class);
       $middleware->redirectUsersTo('/admin/dashboard'); 

        $middleware->alias([
        'check.zip' => \App\Http\Middleware\CheckZipCodeSession::class,
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
