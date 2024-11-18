<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Notification;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $employeeId = Auth::user()->employee_id;

                $notifications = Notification::where('employee_id', $employeeId)
                    ->orderBy('created_at', 'desc')
                    ->get();

                $unreadNotificationsCount = Notification::where('employee_id', $employeeId)
                    ->where('read', false)
                    ->count();
            } else {
                
                $notifications = collect();
                $unreadNotificationsCount = 0;
            }

            $view->with(compact('notifications', 'unreadNotificationsCount'));
        });
   
    View::composer('*', function ($view) {
        $user = Auth::user();
        $allowedRoutes = [];

        if ($user) {
            $employeeId = $user->employee_id;

            if (Str::startsWith($employeeId, 'EMP')) {
                $role = 'Employee';
            } elseif (Str::startsWith($employeeId, 'SBA')) {
                $role = 'SubAdmin';
            } else {
                $role = 'SuperAdmin';
            }

            $allowedRoutes = config("roles.$role", []);
        }

        $view->with('allowedRoutes', $allowedRoutes);
    });
}

}
