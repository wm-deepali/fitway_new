<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        // Deactivated sub-admin: log out immediately
        if (! $user->status) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors(['email' => 'Your account is inactive.']);
        }

        // Main admin can open everything
        if ($user->isSuperAdmin()) {
            return $next($request);
        }

        $config = config('admin_permissions');
        $name   = Str::after((string) $request->route()->getName(), 'admin.');

        // Pages every logged-in admin may open (profile, logout, ...)
        foreach ($config['open'] as $open) {
            if ($name === $open || Str::startsWith($name, $open . '.')) {
                return $next($request);
            }
        }

        // Find the module for this route name (longest matching prefix wins)
        $match = collect(array_keys($config['routes']))
            ->filter(fn ($key) => $name === $key || Str::startsWith($name, $key . '.'))
            ->sortByDesc(fn ($key) => strlen($key))
            ->first();

        // Route not mapped => super admin only
        if (! $match) {
            abort(403, 'You do not have permission to access this page.');
        }

        [$module, $items] = $config['routes'][$match];
        $items  = (array) $items ?: [null];
        $action = $config['overrides'][$name] ?? $this->actionFor($name, $request);

        $allowed = collect($items)->contains(fn ($item) => $user->hasPermission($module, $item, $action));

        if (! $allowed) {
            abort(403, 'You do not have permission to access this page.');
        }

        return $next($request);
    }

    // index/show => view, create/store => add, edit/update => edit, destroy => delete
    private function actionFor(string $name, Request $request): string
    {
        $map = [
            'index' => 'view', 'show' => 'view',
            'create' => 'add', 'store' => 'add',
            'edit' => 'edit', 'update' => 'edit',
            'destroy' => 'delete',
        ];

        $last = Str::afterLast($name, '.');

        if (isset($map[$last])) {
            return $map[$last];
        }

        return match ($request->method()) {
            'GET', 'HEAD' => 'view',
            'DELETE'      => 'delete',
            default       => 'edit',
        };
    }
}