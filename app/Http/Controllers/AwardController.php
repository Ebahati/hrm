<?php
namespace App\Http\Controllers;
use App\Models\Award;
use App\Models\Employee;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function create()
    {
        // Show the form for adding a new award
        $employees = Employee::all(); // Get the employee data
        return view('admin.addAward', compact('employees'));
    }

    public function showAward()
    {
        // Show the list of awards
        $awards = Award::all(); // Fetch all awards
        return view('admin.manageAward', compact('awards'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'employee_id' => 'required|string',
            'award_category' => 'required|string',
            'gift_item' => 'required|string',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);
    
        // Create a new award
        Award::create([
            'employee_id' => $request->employee_id,
            'award_category' => $request->award_category,
            'gift_item' => $request->gift_item,
            'date' => $request->date,
            'description' => $request->description,
        ]);
    
        // Redirect back with success message
        return redirect()->route('manageAward')->with('success', 'Award added successfully!');
    }

    public function destroy($id)
{
    $award = Award::findOrFail($id);
    $award->delete();

    return redirect()->route('manageAward')->with('success', 'Award deleted successfully!');
}

}