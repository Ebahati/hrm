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
    @foreach($leaveRequests as $leave)
        <tr>
            <td>{{ $leave->employee->name }}</td>
            <td>{{ $leave->reason }}</td>
            <td>{{ $leave->start_date }}</td>
            <td>{{ $leave->end_date }}</td>
            <td>{{ $leave->leave_days }}</td> 
            <td>{{ $leave->leave_category }}</td>
            <td>{{ $leave->status }}</td>
            <td>
    <div class="d-flex align-items-center gap-3">
        <form class="approve-form" action="{{ route('approveLeave', $leave->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="button" class="btn btn-success approve-button" data-leave-id="{{ $leave->id }}">Approve</button>
        </form>
        <form class="reject-form" action="{{ route('rejectLeave', $leave->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="button" class="btn bg-danger-subtle text-danger reject-button" data-leave-id="{{ $leave->id }}">Reject</button>
        </form>
    </div>
</td>




        </tr>
    @endforeach
</tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- end File export -->
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.approve-button').on('click', function() {
            var leaveId = $(this).data('leave-id');
            $.ajax({
                url: '/leave-reports/approve/' + leaveId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' 
                },
                success: function(response) {
                   
                    alert('Leave application approved successfully.');
                    location.reload(); 
                },
                error: function(xhr) {
                    alert('Error approving leave: ' + xhr.responseText);
                }
            });
        });

        $('.reject-button').on('click', function() {
            var leaveId = $(this).data('leave-id');
            $.ajax({
                url: '/leave-reports/reject/' + leaveId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' 
                },
                success: function(response) {
                   
                    alert('Leave application rejected successfully.');
                    location.reload(); 
                },
                error: function(xhr) {
                    alert('Error rejecting leave: ' + xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
