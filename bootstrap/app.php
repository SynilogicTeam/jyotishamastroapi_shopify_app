<?php

use App\Http\Middleware\ContentSecurityPolicy;
use App\Http\Middleware\VerifySessionToken;
use App\Http\Middleware\VerifyWebhooks;
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

        /* global middleware */
        $middleware->append([
            VerifySessionToken::class,
            ContentSecurityPolicy::class,
        ]);

        $middleware->alias([
            'VerifyWebhooks' => VerifyWebhooks::class,
            'VerifySessionToken' => VerifySessionToken::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
