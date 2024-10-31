<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employee; 
use App\Models\Leave; 
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function showLeaveApplicationForm()
    {
        
        $employees = Employee::all();

        return view('admin.addLeave', compact('employees'));
    }

    public function storeLeaveApplication(Request $request)
{
    
    $request->validate([
     
        'employee_id' => 'required|exists:employees,employee_id',
        'leave_category' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date', 
        'reason' => 'required|string',
    ]);

 
    Leave::create([
        'employee_id' => $request->input('employee_id'),
        'leave_category' => $request->input('leave_category'),
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
        'reason' => $request->input('reason'),
    ]);

    
   return redirect()->back()->with('success', 'Leave application submitted successfully!');

}


public function approve($id)
{
    $leave = Leave::findOrFail($id);
   
    $leave->status = 'approved';

    return response()->json(['message' => 'Leave application approved successfully.']);
}

public function reject($id)
{
    $leave = Leave::findOrFail($id);
   
    $leave->status = 'rejected'; 
    $leave->save();

    return response()->json(['message' => 'Leave application rejected successfully.']);
}


public function showStatus()
{
   
    if (auth()->check()) {
       
        $userId = auth()->user()->employee_id;

      
        $leaveApplications = Leave::where('employee_id', $userId)->get();

        return view('admin.leaveStatus', compact('leaveApplications'));
    } else {
        
        return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
    }
}


    public function manageLeaves()
    {
        
        $leaveRequests = Leave::with('employee')->get(); 


        foreach ($leaveRequests as $leave) {
            $startDate = Carbon::parse($leave->start_date);
            $endDate = Carbon::parse($leave->end_date);
            $leave->leave_days = $startDate->diffInDays($endDate) + 1; 
        }

        return view('admin.manageLeave', compact('leaveRequests'));
    }

    public function showReports(Request $request)
    {
       
        $employees = Employee::all();

       
        $leaves = Leave::query();

        if ($request->filled('employee_id')) {
            $leaves->where('employee_id', $request->employee_id);
        }
        if ($request->filled('from_date')) {
            $leaves->where('start_date', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $leaves->where('end_date', '<=', $request->to_date);
        }
        if ($request->filled('leave_type')) {
            $leaves->where('leave_category', $request->leave_type);
        }
        if ($request->filled('status')) {
            $leaves->where('status', $request->status);
        }

     
        $leaves = $leaves->get();

      
        return view('admin.leaveReports', compact('employees', 'leaves'));
    }

}
