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
                                    <td>{{ $loan->employee->designation }}</td>
                                    <td>${{ number_format($loan->amount, 2) }}</td>
                                    <td id="paidAmount_{{ $loan->id }}">${{ number_format($loan->total_paid, 2) }}</td>
                                    <td id="remainingAmount_{{ $loan->id }}">${{ number_format($loan->remaining_amount, 2) }}</td>
                                    <td>
                                        <span id="loanStatus_{{ $loan->id }}" 
                                              class="badge {{ $loan->status === 'cleared' ? 'bg-success' : 'bg-warning' }}">
                                            {{ ucfirst($loan->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-info" 
                                                onclick="openEditModal({{ $loan->id }}, {{ $loan->amount }}, {{ $loan->total_paid }})">
                                            Edit
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



<!-- Edit Loan Modal -->
<div class="modal fade" id="editLoanModal" tabindex="-1" aria-labelledby="editLoanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editLoanForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editLoanModalLabel">Edit Loan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editLoanId">
                    <div class="mb-3">
                        <label for="loanAmount" class="form-label">Loan Amount</label>
                        <input type="number" class="form-control" id="loanAmount" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="editPaidAmount" class="form-label">Paid Amount</label>
                        <input type="number" class="form-control" id="editPaidAmount" step="0.01" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openEditModal(loanId, totalAmount, totalPaid) {
    document.getElementById('editLoanId').value = loanId;
    document.getElementById('loanAmount').value = totalAmount; 
    document.getElementById('editPaidAmount').value = totalPaid;

    const form = document.getElementById('editLoanForm');
    form.action = `{{ route('loans.update', '') }}/${loanId}`; 

    new bootstrap.Modal(document.getElementById('editLoanModal')).show();
}

document.getElementById('editLoanForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const loanId = document.getElementById('editLoanId').value;
    const loanAmount = parseFloat(document.getElementById('loanAmount').value);
    const currentPaidAmount = parseFloat(document.getElementById(`paidAmount_${loanId}`).textContent.replace(/\$/g, '')) || 0;
    const newPaidAmount = parseFloat(document.getElementById('editPaidAmount').value) || 0;

    const totalPaid = currentPaidAmount + newPaidAmount;
    const newRemainingAmount = (loanAmount - totalPaid).toFixed(2);
    const newStatus = newRemainingAmount <= 0 ? 'cleared' : 'pending';

    fetch(`/loans/${loanId}/update`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({
            paid_amount: newPaidAmount,
            remaining_amount: newRemainingAmount,
            status: newStatus,
        }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert(data.message);
            document.getElementById(`paidAmount_${loanId}`).textContent = `$${totalPaid.toFixed(2)}`;
            document.getElementById(`remainingAmount_${loanId}`).textContent = `$${newRemainingAmount}`;
            const statusBadge = document.getElementById(`loanStatus_${loanId}`);
            statusBadge.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
            statusBadge.className = newStatus === 'cleared' ? 'badge bg-success' : 'badge bg-warning';
        } else {
            alert('Error: ' + data.error); 
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while processing your request: ' + error.message);
    });
});
</script>


@endsection
