<?php
namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
       
       
        $validated = $request->validate([
            'employee_id' => 'required|unique:employees,employee_id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|max:15',
            'marital_status' => 'required',
            'gender' => 'required',
            'birth_date' => 'required|date',
            'id_type' => 'required',
            'id_number' => 'required|unique:employees,id_number',
            'address' => 'required',
            'permanent_address' => 'required',
            'department' => 'required',
            'role' => 'required',
            'nhif' => 'nullable|max:9',
            'nssf' => 'nullable|max:9',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'branch_code' => 'required|digits:5',
            'account_number' => 'required',
             'designation_id' => 'required',
            'work_permit' => 'nullable',
            'joining_date' => 'required|date|after_or_equal:today',
        ]);

       
        Employee::create($validated);

       
        return redirect()->route('dashboard')->with('success', 'Employee added successfully.');
    }

    public function manage()
    {
       
        $employees = Employee::with('designation')->get(); 
        return view('admin.manageEmployee', compact('employees'));
    }


    public function create()
    {
        $lastEmployeeId = Employee::max('id') ?? 0;  
        $departments = Department::all(); 
        $designations = Designation::all();

        return view('admin.newEmployee', [
            'employee' => null,
            'lastEmployeeId' => $lastEmployeeId,
            'departments' => $departments, 
            'designations' => $designations,
        ]);
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all(); 
        $designations = Designation::all(); 

        return view('admin.newEmployee', compact('employee', 'departments', 'designations'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'employee_id' => 'required|unique:employees,employee_id,' . $employee->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required|max:15',
            'marital_status' => 'required',
            'gender' => 'required',
            'birth_date' => 'required|date',
            'id_type' => 'required',
            'id_number' => 'required|unique:employees,id_number,' . $employee->id,
            'address' => 'required',
            'permanent_address' => 'required',
            'department' => 'required',
            'role' => 'required',
            'nhif' => 'nullable|max:9',
            'nssf' => 'nullable|max:9',
            'bank_name' => 'required',
            'branch_name' => 'required',
            'branch_code' => 'required|digits:5',
            'account_number' => 'required',
            'designation_id' => 'required',
            'work_permit' => 'nullable',
            'joining_date' => 'required|date|after_or_equal:today',
        ]);

       
        $employee->update($validated);

        return redirect()->route('manageEmployee')->with('success', 'Employee updated successfully.');
    }

    
}
