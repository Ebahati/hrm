<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         require_once app_path('CentralLogics/helpers.php');
    }

  
function isEmployee($user) {
    return str_starts_with($user->employee_id, 'EMP');
}

}
