<?php
namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Employee; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function manageLoans()
    {
        $loans = Loan::with('employee')->get();
        return view('admin.manageLoan', compact('loans'));
    }

    public function edit($id)
    {
        $loan = Loan::findOrFail($id);
        $employees = Employee::all(); 
        return view('admin.editLoan', compact('loan', 'employees')); 
    }
    
 


    public function update(Request $request, $id)
{
    $loan = Loan::findOrFail($id);

    $validated = $request->validate([
        'paid_amount' => 'required|numeric|min:0',
    ]);

   
    $newTotalPaid = $loan->total_paid + $request->paid_amount;

   
    $remainingAmount = $loan->amount - $newTotalPaid;

    $status = $remainingAmount <= 0 ? 'cleared' : 'pending';

 
    $loan->update([
        'total_paid' => $newTotalPaid,
        'remaining_amount' => $remainingAmount,
        'status' => $status,
        'updated_at' => now()
    ]);

    return redirect()->route('manageLoan')->with('success', 'Loan updated successfully.');
}

    
}
