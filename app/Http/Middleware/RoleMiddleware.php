<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        Log::info('RoleMiddleware dipanggil dengan roles: ' . implode(',', $roles));

        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        Log::info('User role: ' . $user->role);

        if (!in_array($user->role, $roles)) {
            abort(403, 'Akses tidak diizinkan');
        }

        return $next($request);
    }
}
