<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; 

class LogUserActivity
{
    
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // استبعد المسارات والـ assets والـ APIs حسب حاجتك
        if (
            Auth::check()
            && $request->isMethod('GET')
            && !$request->is('api/*')
            && !$request->is('storage/*')
            && !$request->ajax()
        ) {
            activity()
                ->causedBy(Auth::user())
                ->withProperties([
                    'url' => $request->fullUrl(),
                    'method' => $request->method(),
                    'ip' => $request->ip(),
                    'route' => optional($request->route())->getName(),
                ])
                ->log('Visited page');
        }

        return $response;
    }
    
}
