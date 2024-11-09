<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

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
    }
}
