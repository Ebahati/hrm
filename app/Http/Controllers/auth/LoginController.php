<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   

   
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        \Log::info('User authenticated: ' . $user->employee_id); 
        return redirect()->route('dashboard'); 
    }


    public function __construct()
    {
        $this->middleware('auth')->only('logout');
    }

    public function username()
    {
        return 'employee_id';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|exists:users,employee_id',
            'password' => 'required|string',
        ]);
    }
   
public function showLoginForm()
{
    return view('auth.login'); 
}



}
