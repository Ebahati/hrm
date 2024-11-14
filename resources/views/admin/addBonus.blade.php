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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ isset($bonus) ? 'Update Bonus' : 'Add Bonus' }}</h4>
                    </div>

                    <form action="{{ isset($bonus) ? route('updateBonus', $bonus->id) : route('storeBonus') }}" method="POST">
                        @csrf
                        @if(isset($bonus))
                            @method('PUT') 
                        @endif
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="employee_id" class="col-3 text-end col-form-label">Employee ID</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select id="employeeSelect" class="form-select" name="employee_id" onchange="updateEmployeeName()">
                                            <option value="">Select Employee</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->employee_id }}" data-name="{{ $employee->name }}" 
                                                    {{ (isset($bonus) && $bonus->employee_id == $employee->employee_id) ? 'selected' : '' }}>
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
                                        <input type="text" id="employee_name" class="form-control" name="employee_name" 
                                               value="{{ isset($bonus) ? $bonus->employee->name : old('employee_name') }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="bonus_type" class="col-3 text-end col-form-label">Type of Bonus</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" class="form-control" name="bonus_type" 
                                               value="{{ isset($bonus) ? $bonus->bonus_type : old('bonus_type') }}" placeholder="Enter Bonus Type" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
    <div class="row align-items-center">
        <label for="month" class="col-3 text-end col-form-label">Month</label>
        <div class="col-9 border-start pb-2 pt-2">
            <input type="month" class="form-control" name="month" id="month" 
                   value="{{ isset($bonus) ? $bonus->month : old('month') }}" required>
        </div>
    </div>
</div>


                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="amount" class="col-3 text-end col-form-label">Amount</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="number" class="form-control" name="amount" 
                                               value="{{ isset($bonus) ? $bonus->amount : old('amount') }}" step="0.01" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="description" class="col-3 text-end col-form-label">Description</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="text" class="form-control" name="description" 
                                               value="{{ isset($bonus) ? $bonus->description : old('description') }}" placeholder="Optional">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 border-top">
                            <div class="form-group mb-0 text-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($bonus) ? 'Update Bonus' : 'Add Bonus' }}
                                </button>
                                <a href="{{ route('manageBonus') }}" class="btn bg-danger-subtle text-danger ms-6">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        updateEmployeeName();
    });

    function updateEmployeeName() {
        const employeeSelect = document.getElementById('employeeSelect');
        const employeeNameInput = document.getElementById('employee_name');
        const selectedOption = employeeSelect.options[employeeSelect.selectedIndex];
        employeeNameInput.value = selectedOption ? selectedOption.getAttribute('data-name') : '';
    }
</script>

@endsection
