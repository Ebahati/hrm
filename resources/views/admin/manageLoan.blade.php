@extends('admin.layouts.app') 

@section('title', 'Manage Loans')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Manage Loans</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Manage Loans</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3 text-center mb-n5">
                        <img src="{{ asset('assets/logo.png') }}" width="100" height="100" class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>

        <div class="datatables">
            <div class="card">
                <div class="card-body">
                    <div class="mb-2">
                        <a href="{{ route('addLoan') }}" class="btn btn-primary">Add</a>
                    </div>

                    <div class="table-responsive">
                    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Installments</th>
            <th>Date</th>
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
            <td>{{ $loan->employee->designation }}</td>
            <td>{{ $loan->installments }}</td>
            <td>{{ $loan->loan_date }}</td>
            <td>${{ number_format($loan->amount, 2) }}</td>
            <td>
                <input type="number" class="form-control" 
                       id="paidAmount_{{ $loan->id }}" 
                       value="{{ $loan->total_paid }}" 
                       onchange="updateLoan({{ $loan->id }}, {{ $loan->amount }})" />
            </td>
            <td>
                <span id="remainingAmount_{{ $loan->id }}">
                    ${{ number_format($loan->remaining_amount, 2) }}
                </span>
            </td>
            <td>
                <span id="loanStatus_{{ $loan->id }}" 
                      class="badge {{ $loan->status === 'cleared' ? 'bg-success' : 'bg-warning' }}">
                    {{ ucfirst($loan->status) }}
                </span>
            </td>
            <td>
                <button type="button" class="btn btn-success" 
                        onclick="updateLoan({{ $loan->id }}, {{ $loan->amount }})">
                    Update
                </button>
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
function updateLoan(loanId, totalAmount) {
    const paidAmountInput = document.getElementById(`paidAmount_${loanId}`);
    const remainingAmountSpan = document.getElementById(`remainingAmount_${loanId}`);
    const statusBadge = document.getElementById(`loanStatus_${loanId}`);

    const paidAmount = parseFloat(paidAmountInput.value) || 0;
    const remainingAmount = (totalAmount - paidAmount).toFixed(2);
    const status = remainingAmount <= 0 ? 'cleared' : 'pending';


    remainingAmountSpan.textContent = `$${remainingAmount}`;

    
    fetch(`/loans/${loanId}/update`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({
            paid_amount: paidAmount,
            remaining_amount: remainingAmount,
            status: status,
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Loan updated successfully.');

            // Update status badge
            statusBadge.textContent = status.charAt(0).toUpperCase() + status.slice(1);
            statusBadge.className = status === 'cleared' ? 'badge bg-success' : 'badge bg-warning';
        } else {
            console.error('Error updating loan:', data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function clearLoan(loanId) {
    fetch(`/loans/${loanId}/clear`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Loan cleared successfully.');
            location.reload();
        } else {
            console.error('Error clearing loan:', data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
@endsection
