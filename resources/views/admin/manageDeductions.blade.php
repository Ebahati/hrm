@extends('admin.layouts.app')

@section('title', 'Manage Deductions')

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
                                <li class="breadcrumb-item" aria-current="page">Manage Deductions</li>
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
            <div class="card">
                <div class="card-body">
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

                    <div class="mb-2">
                        <a href="{{ route('createDeduction') }}" class="btn btn-primary">Add Deduction</a>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Deduction Reason</th>
                                    <th>Month</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deductions as $deduction)
                                <tr id="deduction-row-{{ $deduction->id }}">
                                    <td>{{ $deduction->employee ? $deduction->employee->name : 'No employee' }}</td>
                                    <td>{{ $deduction->employee && $deduction->employee->designation ? $deduction->employee->designation->name : 'No designation' }}</td>
                                    <td>{{ $deduction->deduction_reason ?? 'No reason provided' }}</td>
                                    <td>{{ $deduction->month }}</td>
                                    <td>Ksh.{{ number_format($deduction->amount, 2) }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <a href="{{ route('editDeductions', ['id' => $deduction->id]) }}" class="btn btn-primary">Edit Deduction</a>
                                            <button class="btn bg-danger-subtle text-danger deleteDeductionButton" 
                                                    data-id="{{ $deduction->id }}" 
                                                    data-url="{{ route('deleteDeduction', $deduction->id) }}">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
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

<script>
    $(document).ready(function() {
        $(document).on('click', '.deleteDeductionButton', function(e) {
            e.preventDefault();

            var deductionId = $(this).data('id');
            var url = $(this).data('url');

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === true) {
                        $('#deduction-row-' + deductionId).remove();
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    toastr.error('An error occurred while deleting the deduction.');
                }
            });
        });
    });
</script>

@endsection
