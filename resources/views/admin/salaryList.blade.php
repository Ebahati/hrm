@extends('admin.layouts.app') 

@section('title', 'Dashboard')

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
                      <li class="breadcrumb-item" aria-current="page">Salary List</li>
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
                  <h4 class="card-title mb-0">List</h4>
                </div>
                <div class="table-responsive" style="max-height: 400px; overflow-y: auto; overflow-x: auto;">
    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Basic Salary</th>
            <th>Bonus</th>
            <th>Medical Allowance</th>
            <th>House Allowance</th>
            <th>NHIF</th>
            <th>NSSF</th>
            <th>Tax</th>
            <th>Deductions</th>
            <th>Total Deductions</th>
            <th>Gross Salary</th>
            <th>Net Salary</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($employees as $employee)
            <tr>
                <td>{{ $employee->employee_id }}</td> 
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->designation }}</td>
                <td>{{ $employee->basic_salary }}</td>
                <td>{{ $employee->bonus }}</td>
                <td>{{ $employee->medical_allowance }}</td>
                <td>{{ $employee->house_allowance }}</td>
                <td>{{ $employee->nhif }}</td>
                <td>{{ $employee->nssf }}</td>
                <td>{{ $employee->tax }}</td>
                <td>{{ $employee->deductions }}</td>
                <td>{{ $employee->total_deductions }}</td>
                <td>{{ $employee->gross_salary }}</td>
                <td>{{ $employee->net_salary }}</td>
                <td>
                    <form action="{{ route('deleteSalary', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this salary?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-danger-subtle text-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="13">No salary data available.</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>




            </div>
            <!-- end File export -->
          </div>
        </div>
      </div>
@endsection
