<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;


class VerifyCsrfToken
{
    /**
     * المسارات المستثناة من التحقق من CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        'stripe/webhook',
    ];
}
