@extends('admin.layouts.app') 

@section('title', 'Payment List')

@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Payment List</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Payment List</li>
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
                    <div class="mb-2">
                        <h4 class="card-title mb-0">Payment List</h4>
                    </div>

                    <div class="table-responsive">
                        <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                            <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                              
                                <th>Net Salary</th>
                                <th>Payment Date</th>
                                <th>Remarks</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salaryPayments as $payment)
                                <tr>
                                    <td>{{ $payment->employee_id }}</td>
                                    <td>{{ $payment->employee->name }}</td>
                                   


                                    <td>{{ $payment->salary->net_salary ?? 'N/A' }}</td> <!-- Fetch net salary from the salary relation -->
                                    <td>{{ $payment->payment_date ?? 'N/A' }}</td>
                                    <td>{{ $payment->remarks ?? 'N/A' }}</td>
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
