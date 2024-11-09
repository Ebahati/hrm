@extends('admin.layouts.app')

@section('title', 'Manage Employees')

@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Employees</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Manage Employees</li>
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
                            <h4 class="card-title mb-0">List of Employees</h4>
                        </div>
                        <div style="overflow-x: auto;">
                       
                        <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact No.</th>
            <th>Marital Status</th>
            <th>Gender</th>
            <th>Birth Date</th>
            <th>ID Type</th>
            <th>ID No.</th>
            <th>Address</th>
            <th>Permanent Address</th>
            <th>Department</th>
            <th>Role</th>
            <th>NHIF</th>
            <th>NSSF</th>
            <th>Bank Name</th>
            <th>Branch Name</th>
            <th>Branch Code</th>
            <th>Account Number</th>
            <th>Designation</th>
            <th>Work Permit</th>
            <th>Joining Date</th>
            <th>Academic Qualifications</th>
            <th>Professional Qualifications</th>
            <th>Experience</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->employee_id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->marital_status }}</td>
                <td>{{ $employee->gender }}</td>
                <td>{{ $employee->birth_date }}</td>
                <td>{{ $employee->id_type }}</td>
                <td>{{ $employee->id_number }}</td>
                <td>{{ $employee->address }}</td>
                <td>{{ $employee->permanent_address }}</td>
                <td>{{ $employee->department }}</td>
                <td>{{ $employee->role }}</td>
                <td>{{ $employee->nhif }}</td>
                <td>{{ $employee->nssf }}</td>
                <td>{{ $employee->bank_name }}</td>
                <td>{{ $employee->branch_name }}</td>
                <td>{{ $employee->branch_code }}</td>
                <td>{{ $employee->account_number }}</td>
                
               
                <td>{{ $employee->designation->name }}</td>

                <td>{{ $employee->work_permit }}</td>
                <td>{{ $employee->joining_date }}</td>
                <td>{{ $employee->academic_qualifications }}</td>
                <td>{{ $employee->professional_qualifications }}</td>
                <td>{{ $employee->experience }}</td>
                <td>
                    <div class="d-flex align-items-center gap-3">
                        <a href="{{ route('editEmployee', $employee->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('manageEmployee.destroy', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-danger-subtle text-danger">Delete</button>
                        </form>
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
@endsection
