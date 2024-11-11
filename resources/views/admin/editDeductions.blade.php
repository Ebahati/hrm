@extends('admin.layouts.app')

@section('title', 'Edit Deduction')

@section('content')
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Edit Deduction</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Deductions</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('assets/logo.png') }}" width="100" height="100" alt="logo" class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Deduction</h4>
                    </div>
                    <form action="{{ route('updateDeduction', $deduction->id) }}" method="POST" class="form-horizontal r-separator">
    @csrf
    @method('PUT')
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="employeeSelect" class="col-3 text-end col-form-label">Employee ID</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select id="employeeSelect" class="form-select" name="employee_id" onchange="updateEmployeeName()">
                                            <option value="">Select Employee</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->employee_id }}" {{ $employee->employee_id == $deduction->employee_id ? 'selected' : '' }}>
                                                    {{ $employee->employee_id }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="employeeName" class="col-3 text-end col-form-label">Employee Name</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" id="employeeName" class="form-control" value="{{ $deduction->employee->name ?? '' }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="amount" class="col-3 text-end col-form-label">Amount to Deduct</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="number" name="amount" class="form-control" value="{{ $deduction->amount }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="month" class="col-3 text-end col-form-label">Month</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="month" name="month" class="form-control" value="{{ $deduction->month }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="deduction_reason" class="col-3 text-end col-form-label">Reason</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" name="deduction_reason" class="form-control" value="{{ $deduction->deduction_reason }}" required />
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-top">
                                <div class="form-group mb-0 text-end">
                                    <button type="submit" class="btn btn-primary">Update Deduction</button>
                                    <button type="button" class="btn bg-danger-subtle text-danger ms-6" onclick="window.location.href='{{ route('manageDeductions') }}'">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const employees = @json($employees);

    function updateEmployeeName() {
        const selectedEmployeeId = document.getElementById('employeeSelect').value;
        const employeeNameField = document.getElementById('employeeName');
        
        const selectedEmployee = employees.find(employee => employee.employee_id === selectedEmployeeId);

        if (selectedEmployee) {
            employeeNameField.value = selectedEmployee.name;
        } else {
            employeeNameField.value = '';
        }
    }

   
    document.addEventListener("DOMContentLoaded", updateEmployeeName);
</script>

@endsection
