<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role->name === 'Admin') {
         
            return $next($request);
        }
        return redirect()->route('produits'); 
    }
}


