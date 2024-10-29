@extends('admin.layouts.app')

@section('title', 'Leave Status')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Leave Application Status</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Leave Status</li>
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
            <!-- start Leave Status -->
            <div class="card">
                <div class="card-body">
                    <div class="mb-2">
                        <h4 class="card-title mb-0">Your Leave Applications</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                            <thead>
                                <tr>
                                    <th>Leave Type</th>
                                    <th>Reason</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Test Data -->
                                <tr>
                                    <td>Annual Leave</td>
                                    <td>Vacation with family</td>
                                    <td>2024-10-20</td>
                                    <td>2024-10-25</td>
                                    <td>Approved</td>
                                </tr>
                                <tr>
                                    <td>Medical Leave</td>
                                    <td>Doctor's appointment</td>
                                    <td>2024-11-01</td>
                                    <td>2024-11-03</td>
                                    <td>Pending</td>
                                </tr>
                                <tr>
                                    <td>Personal Leave</td>
                                    <td>Urgent family matter</td>
                                    <td>2024-11-05</td>
                                    <td>2024-11-07</td>
                                    <td>Rejected</td>
                                </tr>
                                <!-- End Test Data -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end Leave Status -->
        </div>
    </div>
</div>

@endsection
