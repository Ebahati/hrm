<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'employee_id' => ['required', 'string', 'max:255', 'exists:employees,employee_id'], // Ensure the employee ID exists in employees table
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
{
   
    $employeeExists = Employee::where('employee_id', $data['employee_id'])->exists();
    
    if (!$employeeExists) {
        throw new \Exception("Employee ID does not exist.");
    }

    return User::create([
        'employee_id' => $data['employee_id'], 
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
}


public function showRegistrationForm()
{
    return view('auth.register');
}

}
