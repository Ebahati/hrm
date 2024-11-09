@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="body-wrapper">
  <div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
      <div class="card-body px-4 py-3">
        <div class="row align-items-center">
          <div class="col-9">
            <h4 class="fw-semibold mb-8">Expense</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Manage Expenses</li>
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


                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

          <div class="mb-2">
            <a href="{{ route('addExpense') }}" class="btn btn-primary">Add Expense</a>
          </div>

          <div class="table-responsive">
          <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
    <thead>
        <tr>
            <th>ID</th>
          
            <th>Employee Responsible</th>
            <th>Date</th>
            <th>Expense Category</th>
            <th>Amount</th>
            <th>Remarks</th>
            <th>Receipt</th> 
    </thead>
    <tbody>
        @foreach ($expenses as $expense)
        <tr>
            <td>{{ $expense->id }}</td>
          
            <td>{{ $expense->employee_id }}</td>
           
            <td>{{ $expense->expense_date}}</td> 
            <td>{{ $expense->category }}</td>
            <td>{{ number_format($expense->amount, 2) }}</td>
            <td>{{ $expense->remarks }}</td>
            <td>
    @if($expense->receipt_path)
        <a href="{{ asset($expense->receipt_path) }}" download="{{ basename($expense->receipt_path) }}" class="btn btn-info btn-sm">Download Receipt</a>
    @else
        <span class="text-muted">No Receipt</span>
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
