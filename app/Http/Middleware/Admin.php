<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $auth =Auth::user();

        if ($auth && $auth->is_admin) {
            return $next($request);
        } elseif($auth && ! $auth->is_admin){
            return redirect(route('users.index'))->with('not-allowed', 'You don\'t have access on this part of site.');
        }

        return redirect(route('auth.login'))->with('not-allowed', 'Please log in to have access.');

    }
}
