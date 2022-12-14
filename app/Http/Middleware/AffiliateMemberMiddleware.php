<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AffiliateMemberMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->role != User::AFFILIATE_MEMBER) return abort(404);
        else {
            if (Auth::user()->status == 1) return abort(419);
            return $next($request);
        }
    }
}
