<?php
namespace App\Http\Controllers\Employee;
use App\CentralLogics\helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Http\JsonResponse;
class DepartmentController extends Controller
{
 
public function index()
{
    return view('admin.addDepartments');
}
  
   
public function manageDepartments() 
{
    $departments = Department::all();
    return view('admin.manageDepartments', compact('departments'));
}

public function store(Request $request)
{
       $validated = $request->validate([
        'department' => 'required|string|max:255|unique:departments,name',  
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
            return error_api_processor(
                'The department name already exists.',
                422,
                ['errors' => ['department' => 'The department name already exists.']]
            );
        }

        return error_api_processor(
            'An error occurred while adding the department.',
            500,
            ['errors' => ['error' => 'An error occurred while adding the department.']]
        );
    }
}

public function destroy($id)
{
    try {
        $department = Department::findOrFail($id);
        $department->delete();

        return success_api_processor(null, 'Department deleted successfully!', 200);
    } catch (\Exception $e) {
        return error_api_processor('Failed to delete department.', 400);
    }
}
}





