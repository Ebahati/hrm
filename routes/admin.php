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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// EMPLOYEES ROUTES
Route::get('/new-employee', [EmployeeController::class, 'create'])->name('newEmployee');

Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');

Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('editEmployee');

Route::post('/employees/update/{id}', [EmployeeController::class, 'update'])->name('employees.update');

Route::get('/manage-employee', [EmployeeController::class, 'manage'])->name('manageEmployee');

Route::delete('/employees/delete/{id}', [EmployeeController::class, 'destroy'])->name('manageEmployee.destroy');






Route::get('/manage-salary', function () {
    return view('admin.manageSalary'); 
})->name('manageSalary');

Route::get('/salary-payments', function () {
    return view('admin.salaryPayments'); 
})->name('salaryPayments');

Route::get('/payslip-generation', function () {
    return view('admin.payslipGeneration'); 
})->name('payslipGeneration');

Route::get('/salary-list', function () {
    return view('admin.salaryList'); 
})->name('salaryList');

Route::get('/new-increment', function () {
    return view('admin.newIncrement'); 
})->name('newIncrement');

Route::get('/increment-list', function () {
    return view('admin.incrementList'); 
})->name('incrementList');

Route::get('/manage-bonus', function () {
    return view('admin.manageBonus'); 
})->name('manageBonus');

Route::get('/add-bonus', function () {
    return view('admin.addBonus'); 
})->name('addBonus');

Route::get('/manage-deductions', function () {
    return view('admin.manageDeductions'); 
})->name('manageDeductions');

Route::get('/add-deductions', function () {
    return view('admin.addDeductions'); 
})->name('addDeductions');


Route::get('/edit-deductions', function () {
    return view('admin.editDeductions'); 
})->name('editDeductions');
// loan
Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
Route::get('/manage-loan', [LoanController::class, 'manageLoans'])->name('manageLoan'); 
Route::get('/add-loan', [LoanController::class, 'create'])->name('addLoan');


Route::post('/loans/{id}/update-paid', [LoanController::class, 'updatePaid'])->name('loans.updatePaid');
Route::post('/loans/{id}/clear', [LoanController::class, 'clearLoan'])->name('loans.clear');



Route::get('/manage-attendance', function () {
    return view('admin.manageAttendance'); 
})->name('manageAttendance');

Route::get('/attendance-reports', function () {
    return view('admin.attendanceReports'); 
})->name('attendanceReports');


Route::get('/edit-attendance', function () {
    return view('admin.editAttendance'); 
})->name('editAttendance');

Route::get('/expense-list', function () {
    return view('admin.expenseList'); 
})->name('expenseList');

Route::get('/add-Expense', function () {
    return view('admin.addExpense'); 
})->name('addExpense');

Route::get('/add-Leave', function () {
    return view('admin.addLeave'); 
})->name('addLeave');

Route::get('/leave-status', function () {
    return view('admin.leaveStatus'); 
})->name('leaveStatus');

Route::get('/manage-Leave', function () {
    return view('admin.manageLeave'); 
})->name('manageLeave');

Route::get('/leave-reports', function () {
    return view('admin.leaveReports'); 
})->name('leaveReports');


Route::get('/add-Award', function () {
    return view('admin.addAward'); 
})->name('addAward');


Route::get('/manage-Award', function () {
    return view('admin.manageAward'); 
})->name('manageAward');

//  notice


Route::get('/add-notice', function () {
    return view('admin.addNotice');
})->name('addNotice');


Route::get('/manage-notice', [NoticeController::class, 'index'])->name('manageNotice');


Route::post('/notices', [NoticeController::class, 'store'])->name('storeNotice');
Route::delete('/notices/{notice}', [NoticeController::class, 'destroy'])->name('notices.destroy');


Route::get('/notices/{id}', [NoticeController::class, 'show'])->name('viewNotice');

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


Route::get('/manage-leavecategories', function () {
    return view('admin.manageLeaveCategories'); 
})->name('manageLeaveCategories');

Route::get('/add-leavecategories', function () {
    return view('admin.addLeaveCategories'); 
})->name('addLeaveCategories');

// holiday
Route::get('/manage-holiday', [HolidayController::class, 'index'])->name('manageHoliday');
Route::get('/add-holiday', [HolidayController::class, 'create'])->name('addHoliday');
Route::post('/store-holiday', [HolidayController::class, 'store'])->name('storeHoliday');

Route::delete('/Holiday/delete/{id}', [HolidayController::class, 'destroy'])->name('deleteHoliday');
Route::get('/edit-holiday/{id}', [HolidayController::class, 'edit'])->name('editHoliday');
Route::put('/update-holiday/{id}', [HolidayController::class, 'update'])->name('updateHoliday');

Route::put('/update-holiday/{id}', [HolidayController::class, 'update'])->name('updateHoliday');

Route::get('/manage-awardcategories', function () {
    return view('admin.manageAwardCategories'); 
})->name('manageAwardCategories');


Route::get('/add-awardcategories', function () {
    return view('admin.addAwardCategories'); 
})->name('addAwardCategories');

Route::get('/manage-roles', function () {
    return view('admin.manageRoles'); 
})->name('manageRoles');

Route::get('/add-roles', function () {
    return view('admin.addRoles'); 
})->name('addRoles');