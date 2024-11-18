<?php
namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/home';

    public function boot(): void
    {
        
        header('X-Powered-By: SHIVA SOFTWARES AFRICA');

        
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
           
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

           
            Route::prefix('admin')
                ->middleware(['web', 'auth', 'employee.access']) 
                ->group(base_path('routes/admin.php'));

            
            Route::post('/logout', [AuthController::class, 'logout'])
                ->name('logout')
                ->middleware('auth');
        });
    }
}
