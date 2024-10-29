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
                                <li class="breadcrumb-item" aria-current="page">Bonus</li>
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
                <!-- start Employee Timing -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Bonuses</h4>
                    </div>

                    <form action="{{ route('storeBonus') }}" method="POST" class="form-horizontal r-separator">
                        @csrf
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="employee_id" class="col-3 text-end col-form-label">Employee ID</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select id="employeeSelect" class="form-select" name="employee_id" onchange="updateEmployeeName()">
                                            <option value="">Select Employee</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}" data-name="{{ $employee->name }}">{{ $employee->employee_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="employee_name" class="col-3 text-end col-form-label">Employee Name</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" id="employee_name" class="form-control" name="employee_name" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="bonus_type" class="col-3 text-end col-form-label">Type of Bonus</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" class="form-control" name="bonus_type" placeholder="Enter Bonus Type" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
    <div class="row align-items-center">
        <label for="date" class="col-3 text-end col-form-label">Date</label>
        <div class="col-9 border-start pb-2 pt-2">
            <input type="date" class="form-control" name="date" id="date" required min="{{ date('Y-m-d') }}">
        </div>
    </div>
</div>


                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="amount" class="col-3 text-end col-form-label">Amount</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="number" class="form-control" name="amount" step="0.01" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="description" class="col-3 text-end col-form-label">Description</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" class="form-control" name="description" placeholder="Optional">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 border-top">
                            <div class="form-group mb-0 text-end">
                                <button type="submit" class="btn btn-primary">Add Bonus</button>
                                <a href="{{ route('manageBonus') }}" class="btn bg-danger-subtle text-danger ms-6">Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- end Employee Timing -->
            </div>
        </div>
        <!-- End Row -->
    </div>
</div>

<script>
    function updateEmployeeName() {
        const employeeSelect = document.getElementById('employeeSelect');
        const employeeNameInput = document.getElementById('employee_name');
        const selectedOption = employeeSelect.options[employeeSelect.selectedIndex];

       
        employeeNameInput.value = selectedOption.getAttribute('data-name') || '';
    }
</script>

@endsection
