@extends('admin.layouts.app')

@section('title', 'Edit Loan')

@section('content')
<div class="body-wrapper">
  <div class="container-fluid">

    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
      <div class="card-body px-4 py-3">
        <div class="row align-items-center">
          <div class="col-9">
            <h4 class="fw-semibold mb-8">Edit Loan</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('dashboard') }}" class="text-muted text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Loan</li>
              </ol>
            </nav>
          </div>
          <div class="col-3 text-center">
            <img src="{{ asset('assets/logo.png') }}" width="100" height="100" class="img-fluid mb-n4" alt="Logo" />
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Loan</h4>
          </div>

          <form action="{{ route('loans.update', $loan->id) }}" method="POST" class="form-horizontal r-separator" id="loanForm">
            @csrf
            @method('POST')
            <input type="hidden" name="loan_id" value="{{ $loan->id }}">

            <div class="card-body">
         
              <div class="form-group mb-3">
                <div class="row align-items-center">
                  <label for="employeeID" class="col-3 text-end col-form-label">Employee ID</label>
                  <div class="col-9">
                    <input type="text" class="form-control" id="employeeID" value="{{ $loan->employee_id }}" readonly />
                  </div>
                </div>
              </div>

         
              <div class="form-group mb-3">
                <div class="row align-items-center">
                  <label for="employeeName" class="col-3 text-end col-form-label">Employee Name</label>
                  <div class="col-9">
                    <input type="text" class="form-control" id="employeeName" value="{{ $loan->employee->name }}" readonly />
                  </div>
                </div>
              </div>

           
              <div class="form-group mb-3">
                <div class="row align-items-center">
                  <label for="amount" class="col-3 text-end col-form-label">Amount</label>
                  <div class="col-9">
                    <input type="number" class="form-control" id="amount" value="{{ $loan->amount }}" readonly />
                  </div>
                </div>
              </div>

            
              <div class="form-group mb-3">
                <div class="row align-items-center">
                  <label for="paidAmount" class="col-3 text-end col-form-label">New Payment</label>
                  <div class="col-9">
                    <input type="number" class="form-control" id="paidAmount" name="paid_amount" value="{{ old('paid_amount') }}" min="0" step="0.01" required />
                  </div>
                </div>
              </div>

            
              <div class="form-group mb-3">
                <div class="row align-items-center">
                  <label for="remainingAmount" class="col-3 text-end col-form-label">Remaining Amount</label>
                  <div class="col-9">
                    <input type="number" class="form-control" id="remainingAmount" value="{{ $loan->remaining_amount }}" readonly />
                  </div>
                </div>
              </div>
            </div>

            <div class="p-3 border-top">
              <div class="text-end">
                <button type="submit" class="btn btn-primary">Save Changes</button>
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
  
    document.addEventListener('DOMContentLoaded', function() {
        const paidAmountInput = document.getElementById('paidAmount');
        const remainingAmountInput = document.getElementById('remainingAmount');
        const loanAmount = {{ $loan->amount }}; 
        const previousTotalPaid = {{ $loan->total_paid }}; 

      
        function updateRemainingAmount() {
            const newPayment = parseFloat(paidAmountInput.value) || 0;
            const newTotalPaid = previousTotalPaid + newPayment;
            const remainingAmount = loanAmount - newTotalPaid;
            remainingAmountInput.value = remainingAmount.toFixed(2);
        }

      
        paidAmountInput.addEventListener('input', updateRemainingAmount);

      
        updateRemainingAmount();
    });
</script>
@endsection
