@extends('admin.layouts.app')

@section('title', 'Leave Reports')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif
       
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Leave Reports</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Leave Reports</li>
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
                        <h4 class="card-title">Generate Leave Report</h4>
                    </div>
                    <form class="form-horizontal r-separator" method="GET" action="{{ route('leaveReports') }}">
                        <div class="card-body">

                          
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="from_date" class="col-3 text-end col-form-label">From Date</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="date" class="form-control" id="from_date" name="from_date" required />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="to_date" class="col-3 text-end col-form-label">To Date</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <input type="date" class="form-control" id="to_date" name="to_date" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Employee Selection -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="employee_id" class="col-3 text-end col-form-label">Employee ID</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                    <select class="form-select" id="employee_id" name="employee_id" onchange="updateEmployeeName()">
    <option value="" selected>-- Select Employee --</option>
    @foreach($employees as $employee)
        <option value="{{ $employee->employee_id }}" data-name="{{ $employee->name }}">
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
                                    <input type="text" class="form-control" id="employee_name" name="employee_name" readonly />
                                    </div>
                                </div>
                            </div>

                         
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="leave_type" class="col-3 text-end col-form-label">Leave Type</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select class="form-select" id="leave_type" name="leave_type">
                                            <option value="" selected>-- All Leave Types --</option>
                                            <option value="sick">Sick Leave</option>
                                            <option value="casual">Casual Leave</option>
                                            <option value="maternity">Maternity Leave</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                       
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="status" class="col-3 text-end col-form-label">Status</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select class="form-select" id="status" name="status">
                                            <option value="" selected>-- All Status --</option>
                                            <option value="approved">Approved</option>
                                            <option value="pending">Pending</option>
                                            <option value="rejected">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="p-3 border-top">
                            <div class="form-group mb-0 text-end">
                                <button type="submit" class="btn btn-primary">Generate Report</button>
                                <button type="reset" class="btn bg-danger-subtle text-danger ms-6">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Leave Applications</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee</th>
                                        <th>Leave Type</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($leaves as $leave)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $leave->employee->name }}</td>
                                            <td>{{ $leave->leave_category }}</td>
                                            <td>{{ $leave->status }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>

<script>
    function updateEmployeeName() {
    var employeeSelect = document.getElementById("employee_id");
    var employeeNameInput = document.getElementById("employee_name");

    
    var selectedOption = employeeSelect.options[employeeSelect.selectedIndex];


    var employeeName = selectedOption.getAttribute("data-name");

   
    employeeNameInput.value = employeeName;
}

</script>

@endsection
