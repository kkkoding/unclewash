<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserRole
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = $request->user();

        if (! $user || get_class($user) !== $this->mapRoleToModel($role)) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return $next($request);
    }

    private function mapRoleToModel($role)
    {
        return match ($role) {
            'user' => \App\Models\User::class,
            'admin' => \App\Models\Admin::class,
            'partner' => \App\Models\Partner::class,
            default => null,
        };
    }
}

