@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <!-- Header Card -->
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Payroll</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Generate Payslip</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('assets/logo.png') }}" width="100" height="100" alt="modernize-img" class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-12">
                <!-- Payslip Generation Form -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Generate Payslip</h4>
                    </div>
                    <form class="form-horizontal r-separator" method="POST" action="#">
                        @csrf <!-- CSRF token for security -->
                        <div class="card-body">
                            <!-- Payment Date -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="payment_date" class="col-3 text-end col-form-label">Payment Date</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ date('Y-m-d') }}" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Employee Selection -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="employee_id" class="col-3 text-end col-form-label">Employee Name</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select class="form-select" id="employee_id" name="employee_id" required>
                                            <option value="" selected>-- Select Employee --</option>
                                            <option value="1">John Doe</option>
                                            <option value="2">Jane Smith</option>
                                            <option value="3">Michael Johnson</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Basic Salary -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="basic_salary" class="col-3 text-end col-form-label">Basic Salary</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="number" class="form-control" id="basic_salary" name="basic_salary" placeholder="Enter Basic Salary" value="1000" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Allowances -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="allowances" class="col-3 text-end col-form-label">Allowances</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="number" class="form-control" id="allowances" name="allowances" placeholder="Enter Allowances" value="200" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Deductions -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="deductions" class="col-3 text-end col-form-label">Deductions</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="number" class="form-control" id="deductions" name="deductions" placeholder="Enter Deductions" value="50" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Remarks -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="remarks" class="col-3 text-end col-form-label">Remarks</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Any Remarks (Optional)" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 border-top">
                            <div class="form-group mb-0 text-end">
                                <button type="submit" class="btn btn-primary">Generate Payslip</button>
                                <button type="reset" class="btn bg-danger-subtle text-danger ms-6">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</div>

@endsection
