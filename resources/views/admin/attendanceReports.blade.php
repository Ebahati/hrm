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
                        <h4 class="fw-semibold mb-8">Attendance Report</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Attendance Report</li>
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
                <!-- Attendance Report Form -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Generate Attendance Report</h4>
                    </div>
                    <form class="form-horizontal r-separator" method="GET" action="#">
                        <div class="card-body">

                            <!-- Date Range -->
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
                                    <label for="employee_id" class="col-3 text-end col-form-label">Employee Name</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select class="form-select" id="employee_id" name="employee_id">
                                            <option value="" selected>-- Select Employee --</option>
                                            <option value="1">John Doe</option>
                                            <option value="2">Jane Smith</option>
                                            <option value="3">Michael Johnson</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Attendance Status -->
                            <div class="form-group mb-0">
                                <div class="row align-items-center">
                                    <label for="status" class="col-3 text-end col-form-label">Status</label>
                                    <div class="col-9 border-start pb-2 pt-2">
                                        <select class="form-select" id="status" name="status">
                                            <option value="" selected>-- All Status --</option>
                                            <option value="present">Present</option>
                                            <option value="absent">Absent</option>
                                            <option value="late">Late</option>
                                            <option value="leave">On Leave</option>
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
        <!-- End Row -->
    </div>
</div>

@endsection
