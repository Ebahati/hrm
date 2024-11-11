@extends('admin.layouts.app')

@section('title', 'Edit Employee')

@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Edit Employee</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a class="text-muted text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Edit Employee</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="datatables">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('employee.update', $employee->employee_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                             
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <div class="mb-3">
                                                <label for="employee_id">Employee ID</label>
                                                <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ old('employee_id', $employee->employee_id) }}" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $employee->name) }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee->email) }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="marital_status">Marital Status</label>
                                                <select name="marital_status" id="marital_status" class="form-control">
                                                    <option value="Single" {{ $employee->marital_status == 'Single' ? 'selected' : '' }}>Single</option>
                                                    <option value="Married" {{ $employee->marital_status == 'Married' ? 'selected' : '' }}>Married</option>
                                                    <option value="Divorced" {{ $employee->marital_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="gender">Gender</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="Male" {{ $employee->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ $employee->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="birth_date">Birth Date</label>
                                                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $employee->birth_date) }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="id_type">ID Type</label>
                                                <select name="id_type" id="id_type" class="form-control">
                                                    <option value="NID" {{ $employee->id_type == 'NID' ? 'selected' : '' }}>NID</option>
                                                    <option value="Passport" {{ $employee->id_type == 'Passport' ? 'selected' : '' }}>Passport</option>
                                                    <option value="Driving License" {{ $employee->id_type == 'Driving License' ? 'selected' : '' }}>Driving License</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="id_number">ID Number</label>
                                                <input type="text" class="form-control" id="id_number" name="id_number" value="{{ old('id_number', $employee->id_number) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                             
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <div class="mb-3">
                                                <label for="id_number">ID Number</label>
                                                <input type="text" class="form-control" id="id_number" name="id_number" value="{{ old('id_number', $employee->id_number) }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $employee->address) }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="permanent_address">Permanent Address</label>
                                                <input type="text" class="form-control" id="permanent_address" name="permanent_address" value="{{ old('permanent_address', $employee->permanent_address) }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="department">Department</label>
                                                <select name="department_id" id="department" class="form-control">
                                                    <option value="" disabled selected>Select a department</option>
                                                    @foreach($departments as $department)
                                                        <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                                                            {{ $department->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="designation_id">Designation</label>
                                                <select name="designation_id" id="designation_id" class="form-control">
                                                    @foreach($designations as $designation)
                                                        <option value="{{ $designation->id }}" {{ $employee->designation_id == $designation->id ? 'selected' : '' }}>
                                                            {{ $designation->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="bank_name">Bank Name</label>
                                                <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ old('bank_name', $employee->bank_name) }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="branch_name">Branch Name</label>
                                                <input type="text" class="form-control" id="branch_name" name="branch_name" value="{{ old('branch_name', $employee->branch_name) }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="branch_code">Branch Code</label>
                                                <input type="text" class="form-control" id="branch_code" name="branch_code" value="{{ old('branch_code', $employee->branch_code) }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="account_number">Account Number</label>
                                                <input type="text" class="form-control" id="account_number" name="account_number" value="{{ old('account_number', $employee->account_number) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
