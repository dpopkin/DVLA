<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;

class HasAdminRights
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
        if(Str::contains(Auth::user()->email, User::SUPERADMIN))
        {
            return $next($request);
        }
        $adminEmail = User::SUPERADMIN;
        return back()->with('status', "Can't access admin page. Not using $adminEmail email address.");
    }
}
