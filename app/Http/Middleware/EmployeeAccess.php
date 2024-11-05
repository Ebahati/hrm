<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeAccess
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
        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        // Check if the user is an employee
        if ($user->employee_id && strpos($user->employee_id, 'EMP') === 0) {
            // Allow access only to specified routes
            $allowedRoutes = [
                'addLeave',
                'storeLeave',
                'leaveStatus',
                'dashboard',
                'manageFiles',
                'files.store',
                'addFiles',
            ];

            if (!in_array($request->route()->getName(), $allowedRoutes)) {
                return redirect()->route('login'); // Redirect to login if access is denied
            }
        } else {
            return redirect()->route('login'); // Redirect to login if not an employee
        }

        return $next($request);
    }
}
