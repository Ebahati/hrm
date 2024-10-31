@extends('admin.layouts.app') 

@section('title', 'Apply for Leave')

@section('content')
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Leave Application</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Apply for Leave</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3 text-center">
                        <img src="{{ asset('assets/logo.png') }}" width="100" height="100" alt="logo" class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Leave Application Form</h4>
                    </div>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
           
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                    <form action="{{ route('storeLeave') }}" method="POST" class="form-horizontal r-separator">
                        @csrf 
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <div class="row align-items-center">
                                    <label for="employeeId" class="col-3 text-end col-form-label">Employee ID</label>
                                    <div class="col-9">
                                    <select class="form-select" id="employeeId" name="employee_id" required onchange="updateEmployeeName()">
                                            <option value="" disabled selected>Select Employee</option>
                                            @foreach($employees as $employee)
    <option value="{{ $employee->employee_id }}">
        {{ $employee->employee_id }} - {{ $employee->name }}
    </option>
@endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row align-items-center">
                                    <label for="employeeName" class="col-3 text-end col-form-label">Employee Name</label>
                                    <div class="col-9">
                                    <input type="text" id="employeeNameField" name="employee_name" class="form-control" readonly />

                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row align-items-center">
                                    <label for="leaveCategory" class="col-3 text-end col-form-label">Leave Category</label>
                                    <div class="col-9">
                                        <select class="form-select" id="leaveCategory" name="leave_category" required>
                                            <option value="" disabled selected>Select Leave Category</option>
                                            <option value="Annual Leave">Annual Leave</option>
                                            <option value="Sick Leave">Sick Leave</option>
                                            <option value="Maternity Leave">Maternity Leave</option>
                                            <option value="Paternity Leave">Paternity Leave</option>
                                            <option value="Casual Leave">Casual Leave</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row align-items-center">
                                    <label for="startDate" class="col-3 text-end col-form-label">Start Date</label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" id="startDate" name="start_date" value="{{ date('Y-m-d') }}" readonly required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row align-items-center">
                                    <label for="endDate" class="col-3 text-end col-form-label">End Date</label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" id="endDate" name="end_date" min="{{ date('Y-m-d') }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="row align-items-center">
                                    <label for="reason" class="col-3 text-end col-form-label">Reason</label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Enter Reason for Leave" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 border-top">
                            <div class="form-group mb-0 text-end">
                                <button type="submit" class="btn btn-primary">Submit Application</button>
                                <button type="reset" class="btn bg-danger-subtle text-danger ms-3">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function updateEmployeeName() {
    var employeeSelect = document.getElementById("employeeId");
    var employeeNameField = document.getElementById("employeeNameField");
    var selectedOption = employeeSelect.options[employeeSelect.selectedIndex];

  
    var employeeName = "";
    @foreach($employees as $employee)
        if (selectedOption.value == "{{ $employee->employee_id }}") {
            employeeName = "{{ $employee->name }}";
        }
    @endforeach

  
    employeeNameField.value = employeeName;
}

</script>
@endsection
