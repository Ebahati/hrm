<?php
namespace App\Http\Controllers;
use App\Models\Expense;
use App\Models\Employee;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function create()
    {
      
        $employees = Employee::all(['employee_id', 'name']);

     
        return view('admin.addExpense', compact('employees'));
    }

    public function store(Request $request)
    {
        try {
          
            $validatedData = $request->validate([
                'expense_date' => 'required|date',
                'category' => 'required|string|max:255',
                'employee_id' => 'required|exists:employees,employee_id',
                'amount' => 'required|numeric',
                'remarks' => 'nullable|string',
                'receipt' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            ]);
    
       
            $expense = new Expense($validatedData);
            if ($request->hasFile('receipt')) {
                $expense->receipt_path = $request->file('receipt')->store('receipts', 'public');
            }
            $expense->save();
    
            return redirect()->route('expenseList')->with('success', 'Expense added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add expense: ' . $e->getMessage())->withInput();
        }
    }
    

   
public function showExpenses()
    {
        $expenses = Expense::with('employee')->get();  
        return view('admin.expenseList', compact('expenses'));
    }
}
