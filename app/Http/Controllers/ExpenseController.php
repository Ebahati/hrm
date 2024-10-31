<?php
namespace App\Http\Controllers;
use App\Models\Expense;
use App\Models\Employee;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function create()
    {
        // Fetch employees (employee_id and name) from the database
        $employees = Employee::all(['employee_id', 'name']);

        // Pass data to the view
        return view('admin.addExpense', compact('employees'));
    }

    public function store(Request $request)
    {
        try {
            // Validate and create the expense
            $validatedData = $request->validate([
                'expense_date' => 'required|date',
                'category' => 'required|string|max:255',
                'employee_id' => 'required|exists:employees,employee_id',
                'amount' => 'required|numeric',
                'remarks' => 'nullable|string',
                'receipt' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            ]);
    
            // Save the expense
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
        $expenses = Expense::with('employee')->get();  // Assuming 'employee' relationship exists
        return view('admin.expenseList', compact('expenses'));
    }
}
