@extends('admin.layouts.app')

@section('title', 'Update Salary')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Update Salary</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Update Salary</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('assets/logo.png') }}" width="100" height="100" class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('salaryList') }}" method="POST">
                    @csrf

                    <div class="row">
    <div class="col-lg-6 mb-4">
        <label for="employeeId" class="form-label">Employee ID</label>
        <input type="text" class="form-control" id="employeeId" name="employee_id" placeholder="Enter Employee ID" required oninput="fetchEmployeeName()">
    </div>

    <div class="col-lg-6 mb-4">
        <label for="employeeName" class="form-label">Employee Name</label>
        <input type="text" class="form-control" id="employeeName" name="employee_name" placeholder="Employee Name" readonly>
    </div>



                        
                        <div class="col-lg-6 mb-4">
                            <label for="basicSalary" class="form-label">Basic Salary</label>
                            <input type="number" class="form-control" id="basicSalary" name="basic_salary" placeholder="Enter Basic Salary" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <label for="houseAllowance" class="form-label">House Allowance</label>
                            <input type="number" class="form-control" id="houseAllowance" name="house_allowance" placeholder="Enter House Allowance" value="0">
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="medicalAllowance" class="form-label">Medical Allowance</label>
                            <input type="number" class="form-control" id="medicalAllowance" name="medical_allowance" placeholder="Enter Medical Allowance" value="0">
                        </div>

                        <div class="row">
                        <div class="col-lg-6 mb-4">
                            <label for="grossSalary" class="form-label">Gross Salary</label>
                            <input type="number" class="form-control" id="grossSalary" name="gross_salary" placeholder="Gross Salary" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <label for="nhif" class="form-label">NHIF Deduction</label>
                            <input type="number" class="form-control" id="nhif" name="nhif" placeholder="Enter NHIF Deduction" value="0">
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="nssf" class="form-label">NSSF Deduction</label>
                            <input type="number" class="form-control" id="nssf" name="nssf" placeholder="Enter NSSF Deduction" value="0">
                        </div>
                  

                 
                        <div class="col-lg-6 mb-4">
                            <label for="tax" class="form-label">Tax Deduction</label>
                            <input type="number" class="form-control" id="tax" name="tax" placeholder="Enter Tax Deduction" value="0">
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="otherDeductions" class="form-label">Other Deductions</label>
                            <input type="number" class="form-control" id="otherDeductions" name="other_deductions" placeholder="Enter Other Deductions" value="0">
                        </div>
                    </div>

                    

                        <div class="col-lg-6 mb-4">
                            <label for="totalDeductions" class="form-label">Total Deductions</label>
                            <input type="number" class="form-control" id="totalDeductions" name="total_deductions" placeholder="Total Deductions" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <label for="finalSalary" class="form-label">Final Salary</label>
                            <input type="number" class="form-control" id="finalSalary" name="final_salary" placeholder="Final Salary" readonly>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <button type="button" class="btn btn-primary mt-4" onclick="calculateSalaries()">Calculate</button>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <button type="submit" class="btn btn-success">Update Salary</button>
                        <a href="{{ route('salaryList') }}" class="btn bg-danger-subtle text-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function calculateSalaries() {
        const basicSalary = parseFloat(document.getElementById('basicSalary').value) || 0;
        const houseAllowance = parseFloat(document.getElementById('houseAllowance').value) || 0;
        const medicalAllowance = parseFloat(document.getElementById('medicalAllowance').value) || 0;

        const nhif = parseFloat(document.getElementById('nhif').value) || 0;
        const nssf = parseFloat(document.getElementById('nssf').value) || 0;
        const tax = parseFloat(document.getElementById('tax').value) || 0;
        const otherDeductions = parseFloat(document.getElementById('otherDeductions').value) || 0;

        // Calculate gross salary
        const grossSalary = basicSalary + houseAllowance + medicalAllowance;
        document.getElementById('grossSalary').value = grossSalary.toFixed(2);

        // Calculate total deductions
        const totalDeductions = nhif + nssf + tax + otherDeductions;
        document.getElementById('totalDeductions').value = totalDeductions.toFixed(2);

        // Calculate final salary
        const finalSalary = grossSalary - totalDeductions;
        document.getElementById('finalSalary').value = finalSalary.toFixed(2);
    }
</script>

@endsection
