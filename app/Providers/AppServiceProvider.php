<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\SetLocale;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        // Apply middleware to all web routes
        Route::middleware(SetLocale::class)->group(function () {

            require base_path('routes/web.php');
            
        });
        
    }
}
