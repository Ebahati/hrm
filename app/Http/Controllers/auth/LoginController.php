<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

  
    public function login(Request $request)
    {
        
        $validated = $request->validate([
            'employee_id' => 'required|string', 
            'password' => 'required|string',
        ]);
    
       
        $credentials = [
            'employee_id' => $request->employee_id,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($credentials)) {
          
            return redirect()->intended('/admin/dashboard');
        }
    
      
        return back()->withErrors(['employee_id' => 'Invalid credentials.'])->withInput();
    }
    

  
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'employee_id' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
    }

    
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
