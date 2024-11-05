<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Deduction;
use App\Models\Bonus;
use App\Models\Salary;
use Barryvdh\DomPDF\Facade\Pdf;

class SalaryController extends Controller
{
    
    public function createDeductionForm()
    {
        $employees = Employee::all();
        return view('admin.addDeductions', compact('employees'));
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id', 
            'amount' => 'required|numeric',
            'month' => 'required|date',
            'deduction_reason' => 'nullable|string|max:255',
        ]);

        Deduction::create($validated);

        return redirect()->route('manageDeductions')->with('success', 'Deduction added successfully.');
    }

   
    public function manageDeductions()
    {
        $deductions = Deduction::with('employee')->get();
        return view('admin.manageDeductions', compact('deductions'));
    }

 
    public function createBonusForm()
    {
        $employees = Employee::all();
        return view('admin.addBonus', compact('employees'));
    }

   
    public function storeBonus(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id', 
            'bonus_type' => 'required|string|max:255',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
        ]);

        Bonus::create($validated);

        return redirect()->route('manageBonus')->with('success', 'Bonus added successfully.');
    }

    public function manageBonuses()
    {
        $bonuses = Bonus::with('employee')->get(); 
        return view('admin.manageBonus', compact('bonuses'));
    }

   
    public function manageSalary()
    {
        $employees = Employee::with(['bonuses', 'deductions'])->get()->map(function($employee) {
            $employee->bonus_amount = $employee->bonuses->sum('amount');
            $employee->deductions_amount = $employee->deductions->sum('amount');

            
            $employee->nhif_amount = $employee->nhif_amount;
            $employee->nssf_amount = $employee->nssf_amount;

            $employee->other_deductions = 0; 
            $employee->medical_allowance = 0; 
            $employee->house_allowance = 0;

            $employee->gross_salary = $employee->basic_salary 
                + $employee->bonus_amount 
                + $employee->medical_allowance 
                + $employee->house_allowance;

            $employee->total_deductions = $employee->deductions_amount 
                + $employee->nhif_amount 
                + $employee->nssf_amount 
                + $employee->other_deductions;

            return $employee;
        });

        return view('admin.manageSalary', compact('employees'));
    }

    public function salaryList()
    {
        $employees = Employee::join('salaries', 'employees.employee_id', '=', 'salaries.employee_id') 
            ->select(
                'salaries.id',
                'employees.employee_id', 
                'employees.name',
                'employees.designation',
                'salaries.basic_salary',
                'salaries.bonus',
                'salaries.medical_allowance',
                'salaries.house_allowance',
                'salaries.nhif',
                'salaries.nssf',
                'salaries.deductions', 
                'salaries.tax',
                'salaries.other_deductions',
                'salaries.total_deductions',
                'salaries.gross_salary',
                'salaries.net_salary',
                'salaries.updated_at'
            )
            ->get();

        return view('admin.salaryList', compact('employees'));
    }

   
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id', 
              'basic_salary' => 'required|numeric',
            'bonus' => 'nullable|numeric',
            'house_allowance' => 'nullable|numeric',
            'medical_allowance' => 'nullable|numeric',
            'nhif' => 'nullable|numeric',
            'nssf' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'deductions' => 'nullable|numeric',
            'other_deductions' => 'nullable|numeric',
        ]);
    
       
        \Log::info($request->all());
    
        
        $grossSalary = $validatedData['basic_salary'] 
                    + ($validatedData['bonus'] ?? 0)
                    + ($validatedData['house_allowance'] ?? 0)
                    + ($validatedData['medical_allowance'] ?? 0);
    
        $totalDeductions = ($validatedData['nhif'] ?? 0) 
                        + ($validatedData['nssf'] ?? 0) 
                        + ($validatedData['tax'] ?? 0) 
                        + ($validatedData['deductions'] ?? 0)
                        + ($validatedData['other_deductions'] ?? 0);
    
        $netSalary = $grossSalary - $totalDeductions;
    
      
        try {
            Salary::updateOrCreate(
                ['employee_id' => $request->employee_id],
                [
                    'basic_salary' => $validatedData['basic_salary'],
                    'bonus' => $validatedData['bonus'] ?? 0,
                    'house_allowance' => $validatedData['house_allowance'] ?? 0,
                    'medical_allowance' => $validatedData['medical_allowance'] ?? 0,
                    'nhif' => $validatedData['nhif'] ?? 0,
                    'nssf' => $validatedData['nssf'] ?? 0,
                    'tax' => $validatedData['tax'] ?? 0,
                    'deductions' => $validatedData['deductions'] ?? 0,
                    'other_deductions' => $validatedData['other_deductions'] ?? 0,
                    'total_deductions' => $totalDeductions,
                    'gross_salary' => $grossSalary,
                    'net_salary' => $netSalary,
                ]
            );
    
            \Log::info('Salary record updated/created', ['employee_id' => $request->employee_id]);
    
            return redirect()->route('salaryList')->with('success', 'Salary updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Error updating salary: '.$e->getMessage());
            return redirect()->back()->with('error', 'Failed to update salary. Please try again.');
        }
    }
    

    public function storeSalary(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id', 
            'basic_salary' => 'required|numeric',
            'bonus' => 'nullable|numeric',
            'medical_allowance' => 'nullable|numeric',
            'house_allowance' => 'nullable|numeric',
            'nhif' => 'nullable|numeric',
            'nssf' => 'nullable|numeric',
            'other_deductions' => 'nullable|numeric',
        ]);

        $grossSalary = $validatedData['basic_salary'] 
                     + ($validatedData['bonus'] ?? 0)
                     + ($validatedData['medical_allowance'] ?? 0)
                     + ($validatedData['house_allowance'] ?? 0);

        $totalDeductions = ($validatedData['nhif'] ?? 0) 
                         + ($validatedData['nssf'] ?? 0) 
                         + ($validatedData['other_deductions'] ?? 0);

        $netSalary = $grossSalary - $totalDeductions;

        Salary::create(array_merge($validatedData, [
            'gross_salary' => $grossSalary,
            'total_deductions' => $totalDeductions,
            'net_salary' => $netSalary,
        ]));

        return redirect()->route('salaryList')->with('success', 'Salary added successfully!');
    }

    public function destroy($id)
    {
        
        $salary = Salary::find($id);

      
        if (!$salary) {
            return redirect()->route('salaryList')->with('error', 'Salary entry not found.');
        }

      
        $salary->delete();

      
        return redirect()->route('salaryList')->with('success', 'Salary entry deleted successfully.');
    }


    public function showPayslipGenerationForm()
    {
        
        $salaries = Salary::with('employee')->get(); 
        $employees = Employee::all();
    
        return view('admin.payslipGeneration', compact('salaries', 'employees'));
    }
    
    public function getEmployeeSalary($employee_id)
{
    
    $salaryDetails = Salary::where('employee_id', $employee_id)->first();

    if (!$salaryDetails) {
        return response()->json(['error' => 'Salary details not found'], 404);
    }

    return response()->json($salaryDetails);
}
public function generatePayslip(Request $request)
{
    
    $request->validate([
        'employee_id' => 'required',
    ]);

   
    $employee = Employee::where('employee_id', $request->employee_id)->first();
    $salary = Salary::where('employee_id', $employee->employee_id)->first();

    if (!$employee || !$salary) {
        return back()->withErrors(['message' => 'Employee or Salary details not found.']);
    }

   
    $pdf = PDF::loadView('admin.payslipView', compact('employee', 'salary'));

   
    return $pdf->download('payslip_' . $employee->employee_id . '.pdf');
}



}
