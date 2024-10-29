<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Employee; 
use Illuminate\Http\Request;

class LoanController extends Controller
{
   
    public function create()
    {
       
        $employees = Employee::all();

    
        return view('admin.addLoan', compact('employees'));
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'installments' => 'required|integer|min:1',
            'joining_date' => 'required|date|after_or_equal:today',
            'amount' => 'required|numeric|min:1',
        ]);
    
       
        $loan = Loan::create([
            'employee_id' => $request->employee_id,
            'installments' => $request->installments,
            'loan_date' => $request->joining_date,
            'amount' => $request->amount,
            'total_paid' => 0, 
            'remaining_amount' => $request->amount, 
            'status' => 'pending'
        ]);
    
        return redirect()->route('manageLoan')->with('success', 'Loan added successfully.');
    }
    

  
    public function manageEmployees()
    {
        
        $employees = Employee::all();

        return view('admin.manageEmployee', compact('employees'));
    }

    public function manageLoans()
{
  
    $loans = Loan::with('employee')->get();

  
    return view('admin.manageLoan', compact('loans'));
}
public function update(Request $request, $loanId)
{
    try {
        $validated = $request->validate([
            'paid_amount' => 'required|numeric|min:0',
            'remaining_amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:cleared,pending',
        ]);

        $loan = Loan::findOrFail($loanId);
        $loan->total_paid += $validated['paid_amount']; 
        $loan->remaining_amount = $validated['remaining_amount'];
        $loan->status = $validated['status'];

        if ($loan->save()) {
            return response()->json(['success' => true, 'message' => 'Update successfully done!']);
        } else {
            return response()->json(['success' => false, 'error' => 'Database update failed']);
        }
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(['success' => false, 'error' => 'Loan not found'], 404);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json(['success' => false, 'errors' => $e->errors()]);
    } catch (\Exception $e) {
       
        \Log::error('Update Error: '.$e->getMessage());
        return response()->json(['success' => false, 'error' => 'An unexpected error occurred: ' . $e->getMessage()], 500);
    }
}





public function clearLoan($id)
{
    $loan = Loan::findOrFail($id);
    $loan->status = 'cleared';
    $loan->remaining_amount = 0;
    $loan->save();

    return response()->json(['success' => true]);
}

    
    

    
    
}
