@extends('admin.layouts.app')

@section('title', 'Generate Payslip')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <h4 class="fw-semibold mb-8">Generate Payslip</h4>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('generatePayslip') }}" method="POST">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="employee_id" class="form-label">Select Employee ID</label>
                            <select id="employee_id" name="employee_id" class="form-select" required>
                                <option value="">Select Employee ID</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->employee_id }}" 
                                        data-name="{{ $employee->name }}">
                                        {{ $employee->employee_id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label for="employee_name" class="form-label">Employee Name</label>
                            <input type="text" id="employee_name" class="form-control" readonly>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Download Payslip</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Populate employee name when an ID is selected
    document.getElementById('employee_id').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const employeeName = selectedOption.getAttribute('data-name');
        document.getElementById('employee_name').value = employeeName || '';
    });
</script>

@endsection
