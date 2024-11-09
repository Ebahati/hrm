<?php
namespace App\Http\Controllers;
use App\Models\Award;
use App\Models\Employee;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function create()
    {
       
        $employees = Employee::all(); 
        return view('admin.addAward', compact('employees'));
    }

    public function showAward()
    {
       
        $awards = Award::all(); 
        return view('admin.manageAward', compact('awards'));
    }
    public function store(Request $request)
    {
       
        $request->validate([
            'employee_id' => 'required|string',
            'award_category' => 'required|string',
            'gift_item' => 'required|string',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);
    
      
        Award::create([
            'employee_id' => $request->employee_id,
            'award_category' => $request->award_category,
            'gift_item' => $request->gift_item,
            'date' => $request->date,
            'description' => $request->description,
        ]);
    
       
        return redirect()->route('manageAward')->with('success', 'Award added successfully!');
    }

    public function destroy($id)
{
    $award = Award::findOrFail($id);
    $award->delete();

    return redirect()->route('manageAward')->with('success', 'Award deleted successfully!');
}

}