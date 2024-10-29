<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Department;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function manageDesignation()
    {
        $designations = Designation::with('department')->get();
        return view('admin.manageDesignations', compact('designations'));
    }

   
    public function create()
    {
        $departments = Department::all(); 
        return view('admin.addDesignation', compact('departments'));
    }

   
     
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:designations,name',
            'department_id' => 'required|exists:departments,id',
        ]);
    
        try {
            Designation::create($validated);
            return redirect()->route('manageDesignations')->with('success', 'Designation added successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') { 
                return redirect()->back()->withErrors(['name' => 'The designation already exists for this department.'])->withInput();
            }
          
            return redirect()->back()->withErrors(['error' => 'An error occurred while adding the designation.'])->withInput();
        }
    }
    

    

     public function destroy($id)
     {
         $designation = Designation::findOrFail($id);
         $designation->delete();
     
         return redirect()->route('manageDesignations')->with('success', 'Designation deleted successfully.');
     }
     
}
