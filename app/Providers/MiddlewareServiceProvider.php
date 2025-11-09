<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Middleware\LogUserActivity;
use App\Http\Middleware\VerifyCsrfToken;


class MiddlewareServiceProvider extends ServiceProvider
{
   
    public function register(): void
    {
        //
    }

    
    public function boot(Router $router): void
    {
        $router->aliasMiddleware('checkrole', CheckRoleMiddleware::class);

        $router->aliasMiddleware('useractivity', LogUserActivity::class);

        $router->aliasMiddleware('VerifyCsrfToken', VerifyCsrfToken::class);

    }
    
}
