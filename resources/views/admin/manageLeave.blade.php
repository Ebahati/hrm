@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Manage Leaves</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Manage Leaves</li>
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
        <div class="datatables">
            <!-- start File export -->
            <div class="card">
                <div class="card-body">
                    <div class="mb-2">
                        <h4 class="card-title mb-0">Leave Requests List</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Reason</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Leave Days</th>
                                    <th>Type of Leave</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Test Data -->
                                <tr>
                                    <td>John Doe</td>
                                    <td>Medical Leave</td>
                                    <td>2024-10-20</td>
                                    <td>2024-10-25</td>
                                    <td>5</td>
                                    <td>Annual Leave</td>
                                    <td>Pending</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <form action="{{ route('leaveReports', 1) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Approve</button>
                                            </form>
                                            <form action="{{ route('leaveReports', 1) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn bg-danger-subtle text-danger">Reject</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>Vacation</td>
                                    <td>2024-10-22</td>
                                    <td>2024-10-30</td>
                                    <td>8</td>
                                    <td>Vacation Leave</td>
                                    <td>Pending</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <form action="{{ route('leaveReports', 2) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Approve</button>
                                            </form>
                                            <form action="{{ route('leaveReports', 2) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn bg-danger-subtle text-danger">Reject</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sam Wilson</td>
                                    <td>Personal Leave</td>
                                    <td>2024-10-18</td>
                                    <td>2024-10-20</td>
                                    <td>2</td>
                                    <td>Casual Leave</td>
                                    <td>Pending</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <form action="{{ route('leaveReports', 3) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Approve</button>
                                            </form>
                                            <form action="{{ route('leaveReports', 3) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn bg-danger-subtle text-danger">Reject</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end File export -->
        </div>
    </div>
</div>
@endsection
