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
        $middleware->alias([
            'isLogin' => \App\Http\Middleware\isLogin::class,
            'isAdmin' => \App\Http\Middleware\isAdmin::class,
            'isCashier' => \App\Http\Middleware\isCashier::class,
            'isGuest' => \App\Http\Middleware\isGuest::class,
            'isAdminOrCashier' => \App\Http\Middleware\isAdminOrCashier::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
