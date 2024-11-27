<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = Auth::user();

        if (!$user || $user->role !== $permission) {
            return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta rota.');
        }

        return $next($request);
    }
}
