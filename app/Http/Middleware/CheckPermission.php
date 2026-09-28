<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    // usage: ->middleware('permission:gym_equipments,products,view')
    //        ->middleware('permission:dashboard,,view')
    public function handle(Request $request, Closure $next, string $module, ?string $item = null, string $action = 'view')
    {
        $user = Auth::user();

        if (! $user) {
            return redirect('/login'); // adjust to your admin login route
        }

        // deactivated sub-admin: kick out immediately, even if already logged in
        if (! $user->status) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login')->withErrors(['email' => 'Your account is inactive.']);
        }

        if (! $user->hasPermission($module, $item ?: null, $action)) {
            abort(403, 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}