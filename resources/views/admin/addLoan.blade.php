@extends('admin.layouts.app')

@section('title', 'Add Loan')

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
                  <a href="{{ route('dashboard') }}" class="text-muted text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Loan</li>
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
            <h4 class="card-title">Add Loan</h4>
          </div>

          <form action="{{ route('loans.store') }}" method="POST" class="form-horizontal r-separator" id="loanForm">

            @csrf
            <div class="card-body">
            
              <div class="form-group mb-3">
                <div class="row align-items-center">
                  <label for="employeeID" class="col-3 text-end col-form-label">Employee ID</label>
                  <div class="col-9">
                  <select class="form-select" id="employeeID" name="employee_id" required>
    <option selected disabled>Select Employee ID</option>
    @foreach($employees as $employee)
        <option value="{{ $employee->employee_id }}" data-name="{{ $employee->name }}">
            {{ $employee->employee_id }}
        </option>
    @endforeach
</select>

                  </div>
                </div>
              </div>

              
              <div class="form-group mb-3">
                <div class="row align-items-center">
                  <label for="employeeName" class="col-3 text-end col-form-label">Employee Name</label>
                  <div class="col-9">
                    <input type="text" class="form-control" id="employeeName" readonly />
                  </div>
                </div>
              </div>

        
<div class="form-group mb-3">
  <div class="row align-items-center">
    <label class="col-3 text-end col-form-label">Payment Method</label>
    <div class="col-9">
      
      <div class="form-check">
        <input class="form-check-input" type="radio" name="payment_method" id="monthlyInstallment" value="installments" />
        <label class="form-check-label" for="monthlyInstallment">Monthly Installments</label>
      </div>
    </div>
  </div>
</div>


<div class="form-group mb-3" id="installmentsDiv" style="display: none;">
  <div class="row align-items-center">
    <label for="installments" class="col-3 text-end col-form-label">Installments</label>
    <div class="col-9">
      <input type="text" class="form-control" id="installments" name="installments" required pattern="^\d+(\.\d{1,2})?$" placeholder="Enter installments (e.g., 1, 1.5, 2.25)" />
      <div class="invalid-feedback">
          Please enter a valid number with up to 2 decimal places.
      </div>
    </div>
  </div>
</div>



             
              <div class="form-group mb-3">
                <div class="row align-items-center">
                  <label for="joiningDate" class="col-3 text-end col-form-label">Date</label>
                  <div class="col-9">
                    <input type="date" class="form-control" id="joiningDate" name="joining_date" 
                           min="{{ now()->toDateString() }}" required />
                  </div>
                </div>
              </div>

          
              <div class="form-group mb-3">
                <div class="row align-items-center">
                  <label for="amount" class="col-3 text-end col-form-label">Amount</label>
                  <div class="col-9">
                    <input type="number" class="form-control" id="amount" name="amount" min="1" required />
                  </div>
                </div>
              </div>

             
              <div class="form-group mb-3">
                <div class="row align-items-center">
                  <label for="deductedAmount" class="col-3 text-end col-form-label">Amount to be deducted this month</label>
                  <div class="col-9">
                    <input type="text" class="form-control" id="deductedAmount" readonly />
                  </div>
                </div>
              </div>
            </div>

            <div class="p-3 border-top">
              <div class="text-end">
                <button type="submit" class="btn btn-primary">Add</button>
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
  document.addEventListener('DOMContentLoaded', function () {
    const employeeID = document.getElementById('employeeID');
    const employeeName = document.getElementById('employeeName');
    const installmentsDiv = document.getElementById('installmentsDiv');
    const installments = document.getElementById('installments');
    const amount = document.getElementById('amount');
    const deductedAmount = document.getElementById('deductedAmount');

   
    employeeID.addEventListener('change', function () {
      const selectedOption = this.options[this.selectedIndex];
      employeeName.value = selectedOption.getAttribute('data-name') || ''; 
    });

    
    document.querySelectorAll('input[name="payment_method"]').forEach(function (input) {
      input.addEventListener('change', function () {
        if (this.value === 'installments') {
          installmentsDiv.style.display = 'block'; 
        } else {
          installmentsDiv.style.display = 'none'; 
          installments.value = ''; 
          deductedAmount.value = (parseFloat(amount.value) || 0).toFixed(2); 
        }
      });
    });

    // Calculate the deducted amount
    function calculateDeductedAmount() {
      const totalAmount = parseFloat(amount.value) || 0;
      const paymentMethod = document.querySelector('input[name="payment_method"]:checked')?.value;
      const numInstallments = parseFloat(installments.value) || 1; 
      let perMonth;

      if (paymentMethod === 'one_time') {
        deductedAmount.value = totalAmount.toFixed(2);
      } else {
        if (numInstallments % 1 === 0) {
          perMonth = (totalAmount / numInstallments).toFixed(2);
        } else {
          perMonth = (totalAmount * numInstallments).toFixed(2);
        }
        deductedAmount.value = perMonth;
      }
    }

  
    amount.addEventListener('input', calculateDeductedAmount);
    installments.addEventListener('input', calculateDeductedAmount);
  });
</script>


@endsection
