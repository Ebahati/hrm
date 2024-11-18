<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeController;
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


Route::middleware(['auth', 'employee.access'])->group(function () {

    // Dashboard 
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Employee
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('new-employee', 'create')->name('newEmployee');
        Route::post('employees/store', 'store')->name('employees.store');
        Route::get('employee/{employee_id}/edit', 'edit')->name('editEmployee');
        Route::put('employee/{employee_id}/update', 'update')->name('employee.update');
        Route::get('manage-employee', 'manage')->name('manageEmployee');
        Route::delete('employee/{employee_id}/delete', 'destroy')->name('deleteEmployee');
    });

    // Salary 
    Route::controller(SalaryController::class)->group(function () {
        Route::get('manage-salary', 'manageSalary')->name('manageSalary');
        Route::get('employee/details/{id}', 'fetchEmployeeDetails')->name('fetchEmployeeDetails');
        Route::post('salary/update', 'update')->name('updateSalary');
        Route::get('salary-list', 'salaryList')->name('salaryList');
        Route::post('salarystore', 'storeSalary')->name('storeSalary');
        Route::delete('salary/delete/{id}', 'destroy')->name('deleteSalary');
        Route::get('employee/{employee_id}/salary', 'getEmployeeSalary');
        Route::get('generate-payslip', 'showPayslipGenerationForm')->name('generate.payslip');
        Route::post('generate-payslip', 'generatePayslip')->name('generatePayslip');
        Route::get('salary-payments', 'showSalaryPayments')->name('salaryPayments');
        Route::post('pay-salary', 'paySalary')->name('submitPaySalary');
        Route::get('payment-list', 'showPaymentList')->name('paymentList');
        Route::delete('notifications/{id}/delete', 'deleteNotification')->name('deleteNotification');
        Route::post('notifications/mark-read/{notification}', 'markAsRead')->name('markNotificationAsRead');
        Route::get('notifications/unread-count', 'unreadCount');
        Route::get('bonuses', 'createBonusForm')->name('addBonus');
        Route::post('bonus/store', 'storeBonus')->name('storeBonus');
        Route::get('bonuses/manage', 'manageBonuses')->name('manageBonus');
        Route::get('bonus/{id}/edit', 'editBonus')->name('editBonus');
        Route::put('bonus/{id}', 'updateBonus')->name('updateBonus');
        Route::delete('bonus/{id}', 'deleteBonus')->name('deleteBonus');
        Route::get('deductions/create', 'createDeductionForm')->name('createDeduction');
        Route::post('deductions/store', 'store')->name('storeDeduction');
        Route::get('manage-deductions', 'manageDeductions')->name('manageDeductions');
        Route::get('edit-deductions/{id}', 'editDeduction')->name('editDeductions');
        Route::delete('deductions/{id}', 'deleteDeduction')->name('deleteDeduction');
        Route::put('update-deduction/{id}', 'updateDeduction')->name('updateDeduction');
    });

    // Loan 
    Route::controller(LoanController::class)->group(function () {
        Route::post('loans', 'store')->name('loans.store');
        Route::get('manage-loan', 'manageLoans')->name('manageLoan');
        Route::get('add-loan', 'create')->name('addLoan');
        Route::get('loan/{id}/edit', 'edit')->name('editLoan');
        Route::post('loan/{id}/update', 'update')->name('loans.update');
        Route::post('loans/{id}/clear', 'clearLoan')->name('loans.clear');
    });

    // Expense
    Route::controller(ExpenseController::class)->group(function () {
        Route::post('expense/store', 'store')->name('expense.store');
        Route::get('add-Expense', 'create')->name('addExpense');
        Route::get('expense-list', 'showExpenses')->name('expenseList');
    });

    // Leave 
    Route::controller(LeaveController::class)->group(function () {
        Route::get('manage-leave', 'manageLeaves')->name('manageLeave');
        Route::get('leave-reports', 'showReports')->name('leaveReports');
        Route::post('leave-reports/approve/{id}', 'approve')->name('approveLeave');
        Route::post('leave-reports/reject/{id}', 'reject')->name('rejectLeave');
        Route::get('add-leave', 'showLeaveApplicationForm')->name('addLeave');
        Route::post('add-leave', 'storeLeaveApplication')->name('storeLeave');
        Route::get('leave-status', 'showStatus')->name('leaveStatus');
    });

    // Award 
    Route::controller(AwardController::class)->group(function () {
        Route::get('add-Award', 'create')->name('addAward');
        Route::get('manage-Award', 'showAward')->name('manageAward');
        Route::post('add-Award', 'store')->name('storeAward');
        Route::delete('delete-award/{id}', 'destroy')->name('deleteAward');
    });

    // Notice
    Route::controller(NoticeController::class)->group(function () {
        Route::get('add-notice', 'create')->name('addNotice');
        Route::get('manage-notice', 'index')->name('manageNotice');
        Route::post('notices', 'store')->name('storeNotice');
        Route::get('notices/{id}', 'show')->name('viewNotice');
        Route::delete('notices/{id}', 'destroy')->name('deleteNotice');
    });

    // File
    Route::controller(FileController::class)->group(function () {
        Route::get('add-files', 'index')->name('addFiles');
        Route::get('manage-files', 'manageFiles')->name('manageFiles');
        Route::post('files', 'store')->name('files.store');
    });
//department
    Route::controller(DepartmentController::class)->group(function () {
        Route::get('add-departments', 'index')->name('addDepartments');
        Route::get('manage-departments', 'manageDepartments')->name('manageDepartments');
        Route::post('departments', 'store')->name('departments.store');
        Route::delete('departments/{id}', 'destroy')->name('departments.destroy');
    });
    
    // Designation 
    Route::controller(DesignationController::class)->group(function () {
        Route::get('manage-designations', 'manageDesignation')->name('manageDesignations');
        Route::get('add-designation', 'create')->name('addDesignation');
        Route::post('store-designation', 'store')->name('storeDesignation');
        Route::delete('designation/{id}', 'destroy')->name('designations.destroy');
    });

    // Holiday 
    Route::controller(HolidayController::class)->group(function () {
        Route::get('manage-holiday', 'index')->name('manageHoliday');
        Route::get('add-holiday', 'create')->name('addHoliday');
        Route::post('store-holiday', 'store')->name('storeHoliday');
        Route::get('edit-holiday/{id}', 'edit')->name('editHoliday');
        Route::put('update-holiday/{id}', 'update')->name('updateHoliday');
     
        Route::delete('holiday/{id}', 'destroy')->name('deleteHoliday');
    });
});
