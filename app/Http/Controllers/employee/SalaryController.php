<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Deduction;
use App\Models\Bonus;
use App\Models\Salary;
use App\Models\SalaryPayment;
use App\Notifications\SalaryPaid;
use App\Models\Notification;
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
        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'amount' => 'required|numeric',
            'month' => 'required|date_format:Y-m',
            'deduction_reason' => 'nullable|string|max:255',
        ]);
    
        $deduction = new Deduction();
        $deduction->employee_id = $request->employee_id;
        $deduction->amount = $request->amount;
        $deduction->month = $request->month;
        $deduction->deduction_reason = $request->deduction_reason ?? 'No reason provided';
        $deduction->save();
    
        return redirect()->route('manageDeductions')->with('success', 'Deduction added successfully!');
    }
    
    public function deleteDeduction($id)
    {
        try {
            $deduction = Deduction::findOrFail($id);
            $deduction->delete();
    
            return success_api_processor(null, 'Deduction deleted successfully!', 200);
        } catch (\Exception $e) {
            return error_api_processor('Failed to delete deduction. Please try again.', 400);
        }
    }
    

    public function manageDeductions()
    {
        
        $deductions = Deduction::with('employee')->get(); 
        return view('admin.manageDeductions', compact('deductions'));
    }

    public function editDeduction($id)
    {
        $deduction = Deduction::findOrFail($id);
        $employees = Employee::all();
        return view('admin.editDeductions', compact('deduction', 'employees'));
    }

    public function updateDeduction(Request $request, $id)
{
   
    $deduction = Deduction::findOrFail($id);


    $deduction->update($request->all());

    
        return redirect()->route('manageDeductions')->with('success', 'Deduction updated successfully');
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
            'month' => 'nullable|date_format:Y-m', 
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
        ]);
    
        Bonus::create([
            'employee_id' => $validated['employee_id'],
            'bonus_type' => $validated['bonus_type'],
            'month' => $validated['month'] ?? date('Y-m'), 
            'amount' => $validated['amount'],
            'description' => $validated['description'] ?? null,
        ]);
    
        return redirect()->route('manageBonus')->with('success', 'Bonus added successfully.');
    }
    
    
    public function manageBonuses()
    {

        $bonuses = Bonus::with('employee')->get();
        return view('admin.manageBonus', compact('bonuses'));
    }


    public function editBonus($id)
    {
        $bonus = Bonus::findOrFail($id);
        $employees = Employee::all();
        return view('admin.addBonus', compact('bonus', 'employees'));
    }
    
    public function updateBonus(Request $request, $id)
{
   
    $bonus = Bonus::findOrFail($id);

   
    $bonus->employee_id = $request->employee_id;
    $bonus->bonus_type = $request->bonus_type;
    $bonus->amount = $request->amount;
    $bonus->month = $request->month;
    $bonus->description = $request->description;
    
    
    $bonus->save();

   
    return redirect()->route('manageBonus')->with('success', 'Bonus updated successfully.');
}

    

public function deleteBonus($id)
{
    try {
       
        $bonus = Bonus::findOrFail($id);
        $bonus->delete();
        return success_api_processor(null, 'Bonus deleted successfully!', 200);
    } catch (\Exception $e) {
               return error_api_processor('Failed to delete bonus. Please try again.', 400);
    }
}
   
public function manageSalary()
{
    $employees = Employee::with(['bonuses', 'deductions'])->get()->map(function($employee) {
        $employee->bonus_amount = (float) $employee->bonuses->sum('amount');
        $employee->deductions_amount = (float) $employee->deductions->sum('amount');

        $employee->nhif_amount = (float) $employee->nhif;
        $employee->nssf_amount = (float) $employee->nssf;
        $employee->other_deductions = 0; 
        $employee->medical_allowance = 0; 
        $employee->house_allowance = 0;

        $employee->gross_salary = (float) $employee->basic_salary 
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
            ->join('designations', 'employees.designation_id', '=', 'designations.id') 
            ->select(
                'salaries.id',
                'employees.employee_id', 
                'employees.name',
                'designations.name as designation_name', 
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
    try {
        $salary = Salary::findOrFail($id);
        $salary->delete();

        return success_api_processor(null, 'Salary entry deleted successfully!', 200);
    } catch (\Exception $e) {
        return error_api_processor('Failed to delete salary entry.', 400);
    }
}


    public function showPayslipGenerationForm()
    {
        
        $salaries = Salary::with('employee')->get(); 
        $employees = Employee::all();
    
        return view('admin.payslipGeneration', compact('salaries', 'employees'));
    }
    
    public function getEmployeeSalary($employee_id)
{
    
    $salary = Salary::where('employee_id', $employee_id)->first();

    if (!$salary) {
        return response()->json(['error' => 'Salary details not found'], 404);
    }

    return response()->json($salary);
}



public function generatePayslip(Request $request)
{
    
    $employee = Employee::where('employee_id', $request->employee_id)->first();
    $salary = Salary::where('employee_id', $request->employee_id)->first();

  
    if (!$employee) {
        return back()->with('error', 'Employee not found.');
    }

  
    if (!$salary) {
        return back()->with('error', 'Salary details not found for this employee.');
    }

   
    $pdf = PDF::loadView('admin.payslipView', compact('employee', 'salary'));

  
    $payslipFileName = 'payslip_' . $employee->employee_id . '.pdf';

    
    return $pdf->download($payslipFileName);
}



public function showSalaryPayments()
{
    $employees = Employee::join('salaries', 'employees.employee_id', '=', 'salaries.employee_id')
        ->leftJoin('designations', 'employees.designation_id', '=', 'designations.id')
        ->select(
            'employees.employee_id',
            'employees.name',
            'designations.name as designation',
            'salaries.net_salary',
            'salaries.basic_salary',
            'salaries.bonus',
            'salaries.medical_allowance',
            'salaries.house_allowance',
            'salaries.nhif',
            'salaries.nssf',
            'salaries.tax',
            'salaries.deductions',
            'salaries.total_deductions',
            'salaries.gross_salary'
        )
        ->get();

    return view('admin.salaryPayments', compact('employees'));
}
public function paySalary(Request $request)
{
    $request->validate([
        'employee_id' => 'required|exists:employees,employee_id',
        'payment_date' => 'required|date',
        'remarks' => 'nullable|string',
       
    ]);


    $employee = Employee::where('employee_id', $request->employee_id)->first();

   
    $salary = $employee->salary; 

    if (!$salary) {
        return redirect()->route('paymentList')->with('error', 'Salary record not found for this employee.');
    }

   
    $salaryPayment = new SalaryPayment();
    $salaryPayment->employee_id = $employee->employee_id;
    $salaryPayment->payment_date = $request->payment_date;
    $salaryPayment->remarks = $request->remarks;
    $salaryPayment->save();

    $pdf = PDF::loadView('admin.payslipView', [
        'employee' => $employee,
        'salary' => $salary,
        'paymentDate' => $request->payment_date,
        'remarks' => $request->remarks,
     
    ]);

  
    $payslipFileName = 'payslip_' . $employee->employee_id . '_' . now()->format('YmdHis') . '.pdf';
    $pdf->save(storage_path('app/public/payslips/' . $payslipFileName));

    $payslipUrl = url('storage/payslips/' . $payslipFileName);


    $this->sendSalaryNotification($employee, $payslipUrl);

    return redirect()->route('paymentList')->with('success', 'Salary payment recorded successfully and payslip generated!');
}


public function submitPaySalary(Request $request)
{
    
    $validated = $request->validate([
        'payment_date' => 'required|date',
        'employee_id' => 'required|string',
        'net_salary' => 'required|numeric',
        'remarks' => 'nullable|string',
    ]);

  
    $employee = Employee::where('employee_id', $validated['employee_id'])->firstOrFail();

  
    $salaryPayment = new SalaryPayment();
    $salaryPayment->employee_id = $employee->employee_id;
    $salaryPayment->payment_date = $validated['payment_date'];
    $salaryPayment->net_salary = $validated['net_salary'];
    $salaryPayment->remarks = $validated['remarks'];
    $salaryPayment->save();  

  
    $payslipPath = 'payslips/' . $employee->employee_id . '_payslip_' . now()->format('Y_m') . '.pdf';
    $pdf = PDF::loadView('payslipView', compact('employee', 'salaryPayment')); 
    $pdf->save(storage_path('app/public/' . $payslipPath));

  
    Notification::create([
        'employee_id' => $employee->employee_id,
        'title' => 'Salary Paid',
        'message' => 'Check your Account.',
        'payslip_url' => asset('storage/' . $payslipPath), 
        'read' => false,
    ]);

   
    return redirect()->route('dashboard')->with('success', 'Salary payment recorded and notification sent!');
}

public function showPaymentList()
{
    $salaryPayments = SalaryPayment::with('employee', 'salary')->get(); 

    return view('admin.paymentList', compact('salaryPayments'));
}


public function sendSalaryNotification($employee, $payslipUrl)
{
    Notification::create([
        'employee_id' => $employee->employee_id,  
        'title' => 'Salary Paid',
        'message' => 'Check your Account.',
        'payslip_url' => $payslipUrl,
    ]);
}



public function deleteNotification($id)
{
   
    $notification = Notification::findOrFail($id);
    

    $notification->delete();
    
   
    return redirect()->route('dashboard')->with('success', 'Notification deleted successfully.');
}
public function markAsRead($notificationId)
{
    $notification = Notification::findOrFail($notificationId);
    $notification->read = true;
    $notification->save();
 
    return redirect()->back()->with('success', 'Notification marked as read.');
}

public function unreadCount()
{
    $unreadCount = Notification::where('read', false)->count();
    return response()->json(['unreadCount' => $unreadCount]);
}


}
    







