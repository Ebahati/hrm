<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EmployeeAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $employeeId = $user->employee_id;
        $role = null;

       
        if (Str::startsWith($employeeId, 'EMP')) {
            $role = 'Employee';
        } elseif (Str::startsWith($employeeId, 'SBA')) {
            $role = 'SubAdmin';
        } else {
            
            $role = 'SuperAdmin';
        }
      
        if (!$role) {
            return redirect()->route('login')->with('error', 'Invalid Employee ID');
        }
       
        $allowedRoutes = config("roles.$role", []);
        if (!$allowedRoutes) {
            return redirect()->route('login')->with('error', 'Role configuration not found.');
        }

      
        if (!in_array($request->route()->getName(), $allowedRoutes)) {
            return redirect()->route('dashboard')->with('error', 'Access Denied');
        }

        return $next($request);
    }
}
