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

        
        if (!$user) {
            return redirect()->route('login'); 
        }

        $employeeId = $user->employee_id ?? '';

        
        if (empty($employeeId) || preg_match('/^[A-Za-z0-9]+$/', $employeeId)) {
            
            return $next($request);
        }

       
        if (\Str::startsWith($employeeId, 'SBA')) {
           
            $allowedRoutes = [
                'manageLeave', 
                'manageFiles', 
                'addEmployee', 
                'manageEmployee', 
                'manageSalary',
                'salaryList', 
                'bonusList',
                'addLeave',
                'storeLeave',
                'leaveStatus',
                'dashboard',
                'manageFiles',
                'files.store',
                'addFiles', 
              
            ];

            if (in_array($request->route()->getName(), $allowedRoutes)) {
                return $next($request);
            }

            return redirect()->route('dashboard'); 
        }

        
        if (\Str::startsWith($employeeId, 'EMP')) {
          
            $allowedRoutes = [
                'addLeave',
                'storeLeave',
                'leaveStatus',
                'dashboard',
                'manageFiles',
                'files.store',
                'addFiles',
            ];

            if (in_array($request->route()->getName(), $allowedRoutes)) {
                return $next($request); 
            }

            return redirect()->route('dashboard'); 
        }


        return redirect()->route('login');
    }
}
