<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePortalAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->get('portal_authed')) {
            return redirect()->route('portal.login');
        }

        return $next($request);
    }
}
