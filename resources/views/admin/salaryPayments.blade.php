@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
       
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
                                <li class="breadcrumb-item" aria-current="page">Pay Salary</li>
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

        <!-- Row -->
        <div class="row">
            <div class="col-12">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

               
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pay Salary</h4>
                    </div>
                    <form class="form-horizontal r-separator" method="POST" action="{{ route('submitPaySalary') }}">
    @csrf
    <div class="card-body">
       
        <div class="form-group mb-0">
            <div class="row align-items-center">
                <label for="payment_date" class="col-3 text-end col-form-label">Payment Date</label>
                <div class="col-9 border-start pb-2 pt-2">
                    <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ date('Y-m-d') }}" required />
                </div>
            </div>
        </div>

      
        <div class="form-group mb-0">
            <div class="row align-items-center">
                <label for="employee_id" class="col-3 text-end col-form-label">Employee ID</label>
                <div class="col-9 border-start pb-2 pt-2">
                    <select class="form-select" id="employee_id" name="employee_id" required onchange="updateEmployeeDetails()">
                        <option value="" selected>-- Select Employee --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->employee_id }}" 
                                    data-name="{{ $employee->name }}" 
                                    data-salary="{{ $employee->net_salary }}">
                                {{ $employee->employee_id }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group mb-0">
            <div class="row align-items-center">
                <label for="employee_name" class="col-3 text-end col-form-label">Employee Name</label>
                <div class="col-9 border-start pb-2 pt-2">
                    <input type="text" class="form-control" id="employee_name" name="employee_name" readonly placeholder="Selected Employee Name" />
                </div>
            </div>
        </div>

      
        <div class="form-group mb-0">
            <div class="row align-items-center">
                <label for="net_salary" class="col-3 text-end col-form-label">Net Salary</label>
                <div class="col-9 border-start pb-2 pt-2">
                    <input type="number" class="form-control" id="net_salary" name="net_salary" readonly placeholder="Net Salary Amount" />
                </div>
            </div>
        </div>

       
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
            <button type="submit" class="btn btn-primary">Pay</button>
            <button type="reset" class="btn bg-danger-subtle text-danger ms-6">Cancel</button>
        </div>
    </div>
</form>

                </div>
            </div>
        </div>
       
    </div>
</div>

<script>
    function updateEmployeeDetails() {
        const employeeSelect = document.getElementById('employee_id');
        const selectedOption = employeeSelect.options[employeeSelect.selectedIndex];
        
        
        const employeeName = selectedOption.getAttribute('data-name');
        const netSalary = selectedOption.getAttribute('data-salary');
        
       
        document.getElementById('employee_name').value = employeeName || '';
        document.getElementById('net_salary').value = netSalary || '';
    }
</script>

@endsection
