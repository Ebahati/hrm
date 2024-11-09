<?php
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Notice\NoticeController;
use App\Http\Controllers\Holiday\HolidayController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Employee\DepartmentController;
use App\Http\Controllers\Employee\DesignationController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\Employee\SalaryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LeaveController; 
use App\Http\Controllers\AwardController;
use Illuminate\Support\Facades\Auth;

Auth::routes();


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
//employee admin
Route::group(['middleware' => ['role:SuperAdmin,SubAdmin']], function () {
Route::get('/new-employee', [EmployeeController::class, 'create'])->name('newEmployee');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('editEmployee');
Route::post('/employees/update/{id}', [EmployeeController::class, 'update'])->name('employees.update');
Route::get('/manage-employee', [EmployeeController::class, 'manage'])->name('manageEmployee');
Route::delete('/employees/delete/{id}', [EmployeeController::class, 'destroy'])->name('manageEmployee.destroy');
});
//employee
Route::middleware(['auth', 'employee.access'])->group(function () {
    Route::get('/add-leave', [LeaveController::class, 'showLeaveApplicationForm'])->name('addLeave');
    Route::post('/add-leave', [LeaveController::class, 'storeLeaveApplication'])->name('storeLeave');
    Route::get('/leave-status', [LeaveController::class, 'showStatus'])->name('leaveStatus');
    
});
// Salary routes
Route::get('/manage-salary', [SalaryController::class, 'manageSalary'])->name('manageSalary');
Route::get('/employee/details/{id}', [SalaryController::class, 'fetchEmployeeDetails'])->name('fetchEmployeeDetails');
Route::post('/salary/update', [SalaryController::class, 'update'])->name('updateSalary');
Route::get('/salary-list', [SalaryController::class, 'salaryList'])->name('salaryList');
Route::post('/salary/store', [SalaryController::class, 'storeSalary'])->name('storeSalary');
Route::delete('/salary/delete/{id}', [SalaryController::class, 'destroy'])->name('deleteSalary');
Route::get('/employee/{employee_id}/salary', [SalaryController::class, 'getEmployeeSalary']);
Route::get('/generate-payslip', [SalaryController::class, 'showPayslipGenerationForm'])->name('generate.payslip');
Route::post('/generate-payslip', [SalaryController::class, 'generatePayslip'])->name('generatePayslip');
Route::get('/salary-payments', [SalaryController::class, 'showSalaryPayments'])->name('salaryPayments');
Route::post('/pay-salary', [SalaryController::class, 'paySalary'])->name('submitPaySalary');
Route::get('/payment-list', [SalaryController::class, 'showPaymentList'])->name('paymentList');

// notification 

Route::delete('/notifications/{id}/delete', [SalaryController::class, 'deleteNotification'])->name('deleteNotification');
Route::post('/notifications/mark-read/{notification}', [SalaryController::class, 'markAsRead'])->name('markNotificationAsRead');
Route::get('/notifications/unread-count', [SalaryController::class, 'unreadCount']);

// Bonus
Route::get('/bonuses', [SalaryController::class, 'createBonusForm'])->name('addBonus');
Route::post('/bonus/store', [SalaryController::class, 'storeBonus'])->name('storeBonus');
Route::get('/bonuses/manage', [SalaryController::class, 'manageBonuses'])->name('manageBonus');
Route::get('/bonus/{id}/edit', [SalaryController::class, 'edit'])->name('editBonus');
Route::put('/bonus/{id}', [SalaryController::class, 'store'])->name('updateBonus');
Route::delete('/bonus/{id}', [SalaryController::class, 'deleteBonus'])->name('deleteBonus');

//deductions
Route::get('/deductions/create', [SalaryController::class, 'createDeductionForm'])->name('createDeduction');
Route::post('/deductions/store', [SalaryController::class, 'store'])->name('storeDeduction');
Route::get('/manage-deductions', [SalaryController::class, 'manageDeductions'])->name('manageDeductions');
Route::get('/edit-deductions', function () {
    return view('admin.editDeductions'); 
})->name('editDeductions');
Route::delete('/deductions/{id}', [SalaryController::class, 'deleteDeduction'])->name('deleteDeduction');

// loan
Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
Route::get('/manage-loan', [LoanController::class, 'manageLoans'])->name('manageLoan'); 
Route::get('/add-loan', [LoanController::class, 'create'])->name('addLoan');
Route::get('/loan/{id}/edit', [LoanController::class, 'edit'])->name('editLoan');
Route::post('/loan/{id}/update', [LoanController::class, 'update'])->name('loans.update');




Route::post('/loans/{id}/clear', [LoanController::class, 'clearLoan'])->name('loans.clear');

//expense
Route::post('/expense/store', [ExpenseController::class, 'store'])->name('expense.store');
Route::get('/add-Expense', [ExpenseController::class, 'create'])->name('addExpense');
Route::get('/expense-list', [ExpenseController::class, 'showExpenses'])->name('expenseList');

//leave
Route::get('/manage-leave', [LeaveController::class, 'manageLeaves'])->name('manageLeave');
Route::get('/leave-reports', [LeaveController::class, 'showReports'])->name('leaveReports');
Route::post('/leave-reports/approve/{id}', [LeaveController::class, 'approve'])->name('approveLeave');
Route::post('/leave-reports/reject/{id}', [LeaveController::class, 'reject'])->name('rejectLeave');

//award
Route::get('/add-Award', [AwardController::class, 'create'])->name('addAward');
Route::get('/manage-Award', [AwardController::class, 'showAward'])->name('manageAward');
Route::post('/add-Award', [AwardController::class, 'store'])->name('storeAward');
Route::delete('/delete-award/{id}', [AwardController::class, 'destroy'])->name('deleteAward');

//  notice
Route::get('/add-notice', function () {
    return view('admin.addNotice');
})->name('addNotice');
Route::get('/manage-notice', [NoticeController::class, 'index'])->name('manageNotice');
Route::post('/notices', [NoticeController::class, 'store'])->name('storeNotice');

Route::get('/notices/{id}', [NoticeController::class, 'show'])->name('viewNotice');
Route::delete('/notices/{id}', [NoticeController::class, 'destroy'])->name('deleteNotice');

//  files
Route::get('/manage-files', [FileController::class, 'manageFiles'])->name('manageFiles');
Route::post('/files', [FileController::class, 'store'])->name('files.store');
Route::get('/add-files', function () {
    return view('admin.addFiles');
})->name('addFiles');

//  departments
Route::get('/manage-departments', [DepartmentController::class, 'manageDepartments'])->name('manageDepartments');
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('/add-departments', function () {
    return view('admin.addDepartments'); 
})->name('addDepartments');
Route::delete('/departments/{departments}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

// designations
Route::get('/manage-designations', [DesignationController::class, 'manageDesignation'])->name('manageDesignations');
Route::get('/add-designation', function () {
    return view('admin.addDesignation'); 
})->name('addDesignation');
Route::get('/add-designation', [DesignationController::class, 'create'])->name('addDesignation');
Route::post('/store-designation', [DesignationController::class, 'store'])->name('storeDesignation');
Route::delete('/designation/{id}', [DesignationController::class, 'destroy'])->name('designations.destroy');

// holiday
Route::get('/manage-holiday', [HolidayController::class, 'index'])->name('manageHoliday');
Route::get('/add-holiday', [HolidayController::class, 'create'])->name('addHoliday');
Route::post('/store-holiday', [HolidayController::class, 'store'])->name('storeHoliday');
Route::delete('/Holiday/delete/{id}', [HolidayController::class, 'destroy'])->name('deleteHoliday');
Route::get('/edit-holiday/{id}', [HolidayController::class, 'edit'])->name('editHoliday');
Route::put('/update-holiday/{id}', [HolidayController::class, 'update'])->name('updateHoliday');
Route::put('/update-holiday/{id}', [HolidayController::class, 'update'])->name('updateHoliday');
Route::delete('/holiday/{id}', [HolidayController::class, 'destroy'])->name('deleteHoliday');
