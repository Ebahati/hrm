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
           'department_id' => 'required|exists:departments,id',
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
    
  
   public function edit($employee_id)
   {
       $employee = Employee::where('employee_id', $employee_id)->first();
       $departments = Department::all();  
       $designations = Designation::all(); 
   
       return view('admin.editEmployee', compact('employee', 'departments', 'designations'));
   }
   
   public function update(Request $request, $employee_id)
{
  
    $employee = Employee::where('employee_id', $employee_id)->first();

    if (!$employee) {
        return redirect()->route('manageEmployee')->with('error', 'Employee not found');
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email,' . $employee->id,  
        'phone' => 'nullable|string|max:15',
        'marital_status' => 'required|in:Single,Married,Divorced',
        'gender' => 'required|in:Male,Female',
        'birth_date' => 'nullable|date',
        'id_type' => 'nullable|in:NID,Passport,Driving License',
        'id_number' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'permanent_address' => 'nullable|string',
        'department_id' => 'required|exists:departments,id',
        'designation_id' => 'required|exists:designations,id',
        'bank_name' => 'nullable|string|max:255',
        'branch_name' => 'nullable|string|max:255',
        'branch_code' => 'nullable|string|max:255',
        'account_number' => 'nullable|string|max:255',
    ]);

  
    $employee->update([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'marital_status' => $validated['marital_status'],
        'gender' => $validated['gender'],
        'birth_date' => $validated['birth_date'],
        'id_type' => $validated['id_type'],
        'id_number' => $validated['id_number'],
        'address' => $validated['address'],
        'permanent_address' => $validated['permanent_address'],
        'department_id' => $validated['department_id'],
        'designation_id' => $validated['designation_id'],
        'bank_name' => $validated['bank_name'],
        'branch_name' => $validated['branch_name'],
        'branch_code' => $validated['branch_code'],
        'account_number' => $validated['account_number'],
    ]);

    return redirect()->route('manageEmployee')->with('success', 'Employee updated successfully');
}

   

   
    public function destroy($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->first();
        if ($employee) {
            $employee->delete();
        }
        return redirect()->route('manageEmployee')->with('success', 'Employee deleted successfully');
    }
    
    

}
