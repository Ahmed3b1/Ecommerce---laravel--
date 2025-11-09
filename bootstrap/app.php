<?php

use App\Http\Middleware\LocaleMiddleware;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\SetLocale;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {
        // 🌍 ميدلوير اللغة
        $middleware->web(append: [
            SetLocale::class,
        ]);

        // 🚫 استثناء مسار Stripe Webhook من CSRF
        $middleware->validateCsrfTokens(except: [
            'stripe/webhook',
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
