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


   
    public function updatePaid(Request $request, $id)
{
    $loan = Loan::findOrFail($id);
    $loan->total_paid = $request->paid_amount;
    $loan->remaining_amount = $request->remaining_amount;
    $loan->status = $request->status;
    $loan->save();

    return response()->json(['success' => true]);
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
