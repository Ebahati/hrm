@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="body-wrapper">
  <div class="container-fluid">
    <div class="card bg-info-subtle shadow-none overflow-hidden mb-4">
      <div class="card-body px-4 py-3">
        <div class="row align-items-center">
          <div class="col-9">
            <h4 class="fw-semibold mb-8">Expense</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Create Expense</li>
              </ol>
            </nav>
          </div>
          <div class="col-3 text-center mb-n5">
            <img src="{{ asset('assets/logo.png') }}" width="100" height="100" alt="modernize-img" class="img-fluid mb-n4" />
          </div>
        </div>
      </div>
    </div>

   
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Expense</h4>
          </div>

          <form class="form-horizontal r-separator" method="POST" action="{{ route('expense.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group mb-0">
                <div class="row align-items-center">
                  <label for="expense_date" class="col-3 text-end col-form-label">Expense Date</label>
                  <div class="col-9 border-start pb-2 pt-2">
                    <input 
                      type="date" 
                      name="expense_date" 
                      id="expense_date" 
                      class="form-control" 
                      min="{{ date('Y-m-d') }}" 
                      required 
                    />
                  </div>
                </div>
              </div>

              <div class="form-group mb-0">
                <div class="row align-items-center">
                  <label for="category" class="col-3 text-end col-form-label">Expense Category</label>
                  <div class="col-9 border-start pb-2 pt-2">
                    <select name="category" id="category" class="form-select" required>
                      <option value="Travel">Travel</option>
                      <option value="Office Supplies">Office Supplies</option>
                      <option value="Maintenance">Maintenance</option>
                      <option value="Marketing">Marketing</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group mb-0">
                <div class="row align-items-center">
                  <label for="employee_id" class="col-3 text-end col-form-label">Employee Responsible</label>
                  <div class="col-9 border-start pb-2 pt-2">
                    <select name="employee_id" id="employee_id" class="form-select" required onchange="showEmployeeName()">
                      <option value="">Select Employee</option>
                      @foreach($employees as $employee)
                          <option value="{{ $employee->employee_id }}">{{ $employee->employee_id }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group mb-0 mt-3">
                <div class="row align-items-center">
                  <label for="employee_name" class="col-3 text-end col-form-label">Employee Name</label>
                  <div class="col-9 border-start pb-2 pt-2">
                    <input type="text" id="employee_name" class="form-control" readonly />
                  </div>
                </div>
              </div>

              <div class="form-group mb-0">
                <div class="row align-items-center">
                  <label for="amount" class="col-3 text-end col-form-label">Amount</label>
                  <div class="col-9 border-start pb-2 pt-2">
                    <input type="number" step="0.01" name="amount" id="amount" class="form-control" placeholder="Enter amount" required />
                  </div>
                </div>
              </div>

              <div class="form-group mb-0">
                <div class="row align-items-center">
                  <label for="remarks" class="col-3 text-end col-form-label">Remarks</label>
                  <div class="col-9 border-start pb-2 pt-2">
                    <textarea name="remarks" id="remarks" class="form-control" placeholder="Enter remarks" rows="3"></textarea>
                  </div>
                </div>
              </div>

              <div class="form-group mb-0">
                <div class="row align-items-center">
                  <label for="receipt" class="col-3 text-end col-form-label">Upload Receipt (Optional)</label>
                  <div class="col-9 border-start pb-2 pt-2">
                    <input type="file" name="receipt" id="receipt" class="form-control" accept="image/*,application/pdf" />
                  </div>
                </div>
              </div>
            </div>

            <div class="p-3 border-top text-end">
              <button type="submit" class="btn btn-primary">Add</button>
              <button type="reset" class="btn bg-danger-subtle text-danger ms-6">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    const employees = @json($employees);

    function showEmployeeName() {
        const employeeId = document.getElementById('employee_id').value;
        const employee = employees.find(emp => emp.employee_id === employeeId);
        document.getElementById('employee_name').value = employee ? employee.name : '';
    }
</script>
@endsection
