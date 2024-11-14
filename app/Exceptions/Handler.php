<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
       
        $this->renderable(function (QueryException $e, $request) {
            if ($e->getCode() === '22003') { 
                return redirect()->back()->withInput()->withErrors([
                    'amount' => 'The amount entered is too large. Please enter a smaller value.',
                ]);
            }
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }

    
}
