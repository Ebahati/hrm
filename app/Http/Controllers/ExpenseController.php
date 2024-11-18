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
        $validated = $request->validate([
            'expense_date' => 'required|date',
            'category' => 'required|string|max:255',
            'employee_id' => 'required|exists:employees,employee_id',
            'amount' => 'required|numeric',
            'remarks' => 'nullable|string',
            'receipt' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);
    
        try {
           
            $receiptPath = null;
            if ($request->hasFile('receipt')) {
                $receiptPath = $request->file('receipt')->store('receipts', 'public');
            }
    
            $validated['receipt_path'] = $receiptPath;
    
            Expense::create($validated);
    
            return redirect()->route('expenseList')->with('success', 'Expense added successfully.');
        } catch (\Exception $e) { 
            return error_api_processor(
                'An error occurred while adding the expense.',
                500,
                ['errors' => ['error' => $e->getMessage()]]
            );
        }
    }  
      
public function showExpenses()
    {
        $expenses = Expense::with('employee')->get();  
        return view('admin.expenseList', compact('expenses'));
    }
}
