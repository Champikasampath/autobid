<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuctionAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('AuctionUser')) {
            return redirect('login')->with('error', 'Please login to access this resource');
        }
        return $next($request);
    }
}
