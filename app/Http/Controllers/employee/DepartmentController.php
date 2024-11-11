<?php
namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department;


class DepartmentController extends Controller


{
    
   
public function manageDepartments() 
{
    $departments = Department::all();
    return view('admin.manageDepartments', compact('departments'));
}

public function store(Request $request)
{
   
    $validated = $request->validate([
        'department' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
    ]);
    
    try {
        
        Department::create([
            'name' => $validated['department'],
            'description' => $validated['description'],
        ]);

    
        return redirect()->route('manageDepartments')->with('success', 'Department added successfully!');
    } catch (\Illuminate\Database\QueryException $e) {
      
        if ($e->getCode() === '23000') { 
            return redirect()->back()->withErrors(['department' => 'The department name already exists.'])->withInput();
        }

      
        return redirect()->back()->withErrors(['error' => 'An error occurred while adding the department.'])->withInput();
    }
}


   

public function destroy($id)
{

    $department = Department::findOrFail($id);

   
    \App\Models\Notification::whereIn('employee_id', function($query) use ($department) {
        $query->select('id')
              ->from('employees')
              ->where('department_id', $department->id);
    })->update(['employee_id' => null]);

   
    $department->delete();

   
    return redirect()->route('manageDepartments')->with('success', 'Department deleted successfully.');
}

}



