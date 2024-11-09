@extends('admin.layouts.app')

@section('title', 'Manage Loans')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <h4 class="fw-semibold mb-8">Manage Loans</h4>
            </div>
        </div>

        <div class="datatables">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="mb-2">
                        <a href="{{ route('addLoan') }}" class="btn btn-primary">Add Loan</a>
                    </div>

                    <div class="table-responsive">
                        <table id="loansTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Remaining Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                            @foreach($loans as $loan)
    <tr id="loanRow_{{ $loan->id }}">
        <td>{{ $loan->id }}</td>
        <td>{{ $loan->employee->name }}</td>
        <td>{{ $loan->employee->designation->name }}</td>
        <td>Ksh.{{ number_format($loan->amount, 2) }}</td>
        <td>Ksh.{{ number_format($loan->total_paid, 2) }}</td>
        <td>Ksh.{{ number_format($loan->remaining_amount, 2) }}</td>
        <td>
            <span id="loanStatus_{{ $loan->id }}" 
                  class="badge {{ $loan->status === 'cleared' ? 'bg-success' : 'bg-warning' }}">
                {{ ucfirst($loan->status) }}
            </span>
        </td>
        <td>
            @if($loan->status !== 'cleared')
               
                <a href="{{ route('editLoan', $loan->id) }}" class="btn btn-info">Edit</a>
            @endif
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

@endsection
